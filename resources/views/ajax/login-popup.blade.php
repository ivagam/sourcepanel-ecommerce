<div class="modal-wrapper login-popup">
    <div class="container">
        <h2 class="title">Login</h2>

        <form action="#" class="mb-0">
            <label for="login-email">
                Username or email address
                <span class="required">*</span>
            </label>
            <input type="email" class="form-input form-wide mb-2" id="login-email" required />

            <label for=" login-password">Password<span class="required"> *</span></label>

            <input type="password" class="form-input form-wide mb-2" id="login-password" required />

            <div class="form-footer">
                <div class="custom-control custom-checkbox ml-0">
                    <input type="checkbox" class="custom-control-input" id="lost-password" />
                    <label class="custom-control-label form-footer-right" for="lost-password">Remember me</label>
                </div>
                <div class="form-footer-right">
                    <a href="{{ route('forgot.password') }}" class="forget-password">Forgot Password?</a>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-dark btn-block btn-md">
                    LOGIN
                </button>

                <button type="submit" class="btn btn-regist bg-transparent text-transform-none p-0" title="register button">
                    Register Now!
                </button>
            </div>
        </form>
    </div>

    <button title="Close (Esc)" type="button" class="mfp-close">
        ×
    </button>
</div>