<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WhatsApp Messages</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f9f9f9;
    }
    table {
      width: 100%;
      max-width: 600px;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: left;
      position: relative;
    }
    th {
      background-color: #f4f4f4;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .shortcut {
      cursor: pointer;
      color: #333;
      text-decoration: none;
      font-size: 20px;
      font-weight: bold;
      padding: 4px 25px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f0f0f0;
      transition: background-color 0.2s ease;
    }
    .shortcut:hover {
      background-color: #e0e0e0;
    }
    .copied-message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(10px, -50%);
      background-color: #4CAF50;
      color: white;
      padding: 4px 8px;
      font-size: 12px;
      border-radius: 4px;
      display: none;
      white-space: nowrap;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      z-index: 100;
    }
    /* Hidden input for mobile */
    #mobileInput {
      opacity: 0;
      position: absolute;
      left: -9999px;
    }
  </style>
</head>
<body>

  <h2>WhatsApp Messages</h2>

  <table>
    <thead>
      <tr>
        <th>Message</th>
        <th>Shortcut</th>
      </tr>
    </thead>
    <tbody>
      @foreach($msg as $item)
      <tr>
        <td>{{ $item->message }}</td>
        <td>
          <div class="shortcut" data-shortcut="{{ strtolower($item->shortcut) }}" data-message="{{ addslashes($item->message) }}">
            {{ $item->shortcut }}
            <div class="copied-message">Copied!</div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Hidden input for mobile keyboard -->
  <input id="mobileInput" type="text" autocomplete="off" autocorrect="off" />

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const shortcuts = {};
      document.querySelectorAll('.shortcut').forEach(element => {
        const key = element.getAttribute('data-shortcut');
        shortcuts[key] = element;

        // Tap/click (works on mobile & desktop)
        element.addEventListener('click', () => {
          const message = element.getAttribute('data-message');
          copyMessage(element, message);
        });
      });

      // Desktop keyboard shortcuts
      document.addEventListener('keydown', (e) => {
        const key = e.key.toLowerCase();
        if (shortcuts[key]) {
          const element = shortcuts[key];
          const message = element.getAttribute('data-message');
          copyMessage(element, message);
        }
      });

      // Mobile: hidden input listens to soft keyboard
      const mobileInput = document.getElementById('mobileInput');
      mobileInput.focus();

      mobileInput.addEventListener('input', () => {
        const key = mobileInput.value.toLowerCase();
        if (shortcuts[key]) {
          const element = shortcuts[key];
          const message = element.getAttribute('data-message');
          copyMessage(element, message);
        }
        // clear input for next key
        mobileInput.value = '';
      });

      // Always keep input focused on mobile
      document.body.addEventListener('touchstart', () => {
        if (document.activeElement !== mobileInput) {
          mobileInput.focus();
        }
      });
    });

    function copyMessage(element, message) {
      navigator.clipboard.writeText(message).then(function() {
        showCopiedMessage(element);
      }, function(err) {
        alert('Failed to copy text: ' + err);
      });
    }

    function showCopiedMessage(element) {
      const popup = element.querySelector('.copied-message');
      popup.style.display = 'block';
      setTimeout(() => {
        popup.style.display = 'none';
      }, 1500);
    }
  </script>

</body>
</html>
