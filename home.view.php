<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<style>
    body {
    background: #3d2f1d;    
    display: flex;
    justify-content: center;
    padding: 40px;
    font-family: "Georgia", serif;
}
.paper {
    width: 700px;
    background: #f5e6c8;
    padding: 40px;
    position: relative;

    border: 4px solid transparent;
    border-radius: 10px;

    box-shadow:
        0 0 40px 10px rgba(0,0,0,0.6),
        inset 0 0 50px rgba(0,0,0,0.4);

    background-image:
        radial-gradient(rgba(0,0,0,0.2) 1px, transparent 1px),
        linear-gradient(0deg, #f1ddba, #f5e6c8);
    background-size: 4px 4px, 100%;
}
.logo-area {
    width: 180px;
    height: 120px;
    border: 2px dashed rgba(0,0,0,0.3);
    margin-bottom: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-style: italic;
    color: rgba(0,0,0,0.4);
} 
</style>
<body>
    <div class="paper">
        <main class="card">

            <div class="logo-area">
                <img src="img/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.webp" alt="Old Folks Home Log">
            </div>

            <div class="masthead">
                <h1>Welcome to Our<br>Old Folks Home</h1>
            </div>

            <p class="lead">
                Providing comfort, care, and community for our residents.
                A place where tradition and warmth guide every day.
            </p>

            <a class="btn" href="register.view.php">Register</a>
            <a class="btn ghost" href="login.view.php">Login</a>

            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Old Folks Home Management System
            </div>p echo date("Y"); ?> Old Folks Home Management System
    </div>
</body>
</html>