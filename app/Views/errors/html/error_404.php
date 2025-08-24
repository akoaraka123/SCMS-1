<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            padding: 20px; 
            text-align: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-container {
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        h1 { font-size: 4em; margin: 0; }
        p { font-size: 1.2em; margin: 20px 0; }
        .back-link {
            color: white;
            text-decoration: none;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s;
        }
        .back-link:hover {
            background: white;
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="<?= base_url() ?>" class="back-link">Go Back Home</a>
    </div>
</body>
</html>
