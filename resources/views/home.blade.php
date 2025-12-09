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
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        font-style: italic;
        color: rgba(0,0,0,0.4);
    } 
    .logo-wrap{
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }
    button {
            padding: 10px 15px;
            background: brown;
            color: white;
            border: none;
            cursor: pointer;
        }
    .masthead{
        text-align: center;
    }
    .lead{
        text-align: center;
        width: 60%;
        margin: 0 auto;
    }
    .copyright{
        text-align: center;
        margin: 0 auto;
    }
    .buttons-wrap{
        text-align: center;
        margin: 20px auto;
    }
</style>
<body>
    
    <div class="paper">
        <main class="card">

        <div class="logo-wrap">
            <img class="logo-area" src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">
        </div>

            <div class="masthead">
                <h1>Welcome to Our<br>Old Folks Home</h1>
            </div>

            <p class="lead">
                Providing comfort, care, and community for our residents.
                A place where tradition and warmth guide every day.
            </p>

            <div class="buttons-wrap">
                <button onclick="window.location.href='/register';">Register</button>
                <button onclick="window.location.href='/login';">Login</button>
            </div>

            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Old Folks Home Management System
            </div>
    </div>
</body>
</html>