<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {font-family: Arial, sans-serif; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; margin:0;}
        .container {background:#fff; padding:25px 30px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:360px;}
        h2 {text-align:center; color:#333;}
        label {font-size:14px; color:#555;}
        .field {position:relative;}
        input {width:100%; padding:10px 36px 10px 10px; margin:8px 0 15px 0; border:1px solid #ccc; border-radius:6px; box-sizing:border-box;}
        .toggle-pass {
            position:absolute;
            right:8px;
            top:50%;
            transform:translateY(-50%);
            background:transparent;
            border:none;
            cursor:pointer;
            padding:0;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .toggle-pass svg {
            width:18px;
            height:18px;
            fill:#4a90e2;
        }
        button.submit-btn {width:100%; padding:10px; background:#4a90e2; color:#fff; font-size:16px; border:none; border-radius:6px; cursor:pointer;}
        button.submit-btn:hover {background:#357ab8;}
        .error {color:red; font-size:13px; margin-bottom:10px;}
        .link {text-align:center; margin-top:15px;}
        .link a {color:#4a90e2; text-decoration:none;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password:</label>
            <div class="field">
                <input id="login-password" type="password" name="password" required>
                <button type="button" class="toggle-pass" data-target="login-password" aria-label="Tampilkan password">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>
                </button>
            </div>

            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <button type="submit" class="submit-btn">Login</button>
        </form>

        <div class="link">
            <p>Belum punya akun? <a href="{{ route('register.page') }}">Register</a></p>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-pass').forEach(function(btn){
            btn.addEventListener('click', function(){
                var targetId = this.getAttribute('data-target');
                var input = document.getElementById(targetId);
                if (!input) return;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7c1.984 0 3.705-.463 5.145-1.229l3.283 3.283 1.414-1.414-18-18-1.414 1.414 3.514 3.514c-2.254 1.358-3.942 3.442-4.942 5.432 0 0 3.367 7 11 7 2.492 0 4.668-.625 6.51-1.682l2.646 2.646-1.414 1.414-2.549-2.549c-1.552.828-3.335 1.171-5.193 1.171-7.633 0-11-7-11-7s3.367-7 11-7c1.544 0 3.009.289 4.352.81l1.648 1.648-1.414 1.414-1.53-1.53c-.854-.33-1.768-.502-2.736-.502z"/></svg>';
                } else {
                    input.type = 'password';
                    this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 5c-7.633 0-11 7-11 7s3.367 7 11 7 11-7 11-7-3.367-7-11-7zm0 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-8a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>';
                }
            });
        });
    </script>
</body>
</html>
