<aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
    @php
        use App\Models\Category;

        $categories = Category::with('children')->whereNull('subcategory_id')->get();
        $search = request()->get('search');
        $activeCategoryId = request()->get('category');

        function findMatchingSubcategories($categories, $search) {
            $matches = [];
            foreach ($categories as $category) {
                if ($category->children && $category->children->isNotEmpty()) {
                    foreach ($category->children as $child) {
                        if (stripos($child->category_name, $search) !== false) {
                            $matches[] = $child;
                        }
                        if ($child->children && $child->children->isNotEmpty()) {
                            $matches = array_merge($matches, findMatchingSubcategories([$child], $search));
                        }
                    }
                }
            }
            return $matches;
        }

        function renderSubCategories($category, $activeCategoryId, $prefix = '', $search = null) {
            if (!$category || !$category->children || $category->children->isEmpty()) return;

            echo '<ul class="submenu list-unstyled">';
            foreach ($category->children as $child) {
                // ✅ Skip first-level search match only
                if ($search && strcasecmp($child->category_name, $search) === 0 && $prefix === '') {
                    // Render its children anyway
                    renderSubCategories($child, $activeCategoryId, $prefix . '- ', $search);
                    continue;
                }

                $link = url()->current() . '?' . http_build_query([
                    'search' => $search,
                    'category' => $child->category_id
                ]);

                $activeClass = $child->category_id == $activeCategoryId ? 'active' : '';

                echo '<li class="' . $activeClass . '">';
                echo '<a href="' . $link . '">' . $prefix . e($child->category_name) . '</a>';

                if ($child->children && $child->children->isNotEmpty()) {
                    renderSubCategories($child, $activeCategoryId, $prefix . '- ', $search);
                }

                echo '</li>';
            }
            echo '</ul>';
        }

        $matchedCategories = $search ? findMatchingSubcategories($categories, $search) : [];
    @endphp

    <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
        <h2 class="side-menu-title bg-gray ls-n-25">
            {{ empty($search) ? 'Browse Categories' : 'Sub Categories' }}
        </h2>
        <nav class="side-nav">
            <ul class="menu menu-vertical list-unstyled">
                @if(empty($search))
                    <li class="active"><a href="{{ route('home') }}"><i class="icon-home"></i>Home</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=1">Watches</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Handbags">Handbags</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Shoes">Shoes</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Clothings">Clothings</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Belts">Belts</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Glassware">Glassware</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Sunglasses">Sunglasses</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Jewelery">Jewelery</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Accessories">Accessories</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=113">Others</a></li>
                    <li><a href="{{ env('SOURCE_PANEL_ECOMMERCE_URL') }}?category=Tableware">Tableware</a></li>
                @else
                    @if(count($matchedCategories))
                        @foreach($matchedCategories as $matchedCategory)
                            <li>
                                {{-- Only render children if first-level matches search --}}
                                @if(strcasecmp($matchedCategory->category_name, $search) !== 0)
                                    <a href="{{ url()->current() . '?' . http_build_query(['search' => $search, 'category' => $matchedCategory->category_id]) }}">
                                        {{ $matchedCategory->category_name }}
                                    </a>
                                @endif
                                @php renderSubCategories($matchedCategory, $activeCategoryId, '', $search); @endphp
                            </li>
                        @endforeach
                    @else
                        <li>No category found for "{{ $search }}"</li>
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</aside>
