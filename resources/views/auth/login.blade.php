<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Research Grant Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            margin: 0;
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login-container input {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .login-container button {
            padding: 10px;
            background: #2575fc;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-container button:hover {
            background: #6a11cb;
        }
        .login-container .links {
            margin-top: 10px;
            text-align: center;
        }
        .login-container .links a {
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .login-container .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required autofocus>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
        <div class="links">
            <a href="{{ route('register') }}">Don't have an account? Register here</a><br>
            <a href="{{ route('password.request') }}">Forgot your password?</a>
        </div>
    </div>
</body>
</html>
