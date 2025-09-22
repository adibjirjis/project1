<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {font-family: Arial, sans-serif; background:#eef2f7; display:flex; justify-content:center; align-items:center; height:100vh; margin:0;}
        .card {background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 8px rgba(0,0,0,0.1); text-align:center; width:350px;}
        h1 {color:#333;}
        p {color:#666;}
        a {display:inline-block; margin-top:20px; text-decoration:none; background:#e74c3c; color:#fff; padding:10px 20px; border-radius:6px;}
        a:hover {background:#c0392b;}
    </style>
</head>
<body>
    <div class="card">
        <h1>Halo, {{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }}</p>

        <a href="{{ route('logout') }}">Logout</a>
    </div>
</body>
</html>

