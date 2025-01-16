<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Research Grant Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }
        header {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        header p {
            margin: 5px 0 20px;
            font-size: 1.2rem;
        }
        .content {
            text-align: center;
            padding: 50px 20px;
        }
        .content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 1rem;
            text-decoration: none;
            background: #fff;
            color: #2575fc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .buttons a:hover {
            background: #2575fc;
            color: #fff;
        }
        .features {
            margin-top: 50px;
        }
        .features .card {
            display: inline-block;
            width: 300px;
            margin: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            text-align: left;
        }
        .features .card h3 {
            margin: 0 0 10px;
            font-size: 1.5rem;
        }
        .features .card p {
            font-size: 1rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <header>
        <h1>Research Grant Management System</h1>
        <p>Streamline research grant tracking and management at UNITEN.</p>
    </header>
    <div class="content">
        <h2>Welcome to RGMS</h2>
        <div class="buttons">
            <a href="{{ route('login') }}">Login</a>
            
        </div>
        <div class="features">
            <div class="card">
                <h3>Manage Grants</h3>
                <p>Add, edit, and track research grants easily with our intuitive interface.</p>
            </div>
            <div class="card">
                <h3>Milestone Tracking</h3>
                <p>Stay on top of project progress with detailed milestone tracking.</p>
            </div>
            <div class="card">
                <h3>Academician Management</h3>
                <p>Organize academicians and assign roles for efficient project leadership.</p>
            </div>
        </div>
    </div>
</body>
</html>
