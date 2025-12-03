<?php
session_start();
$conn = new mysqli("localhost", "root", "", "OldHomeManagement");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email    = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if ($user['status'] == 'pending') {
            echo "<script>alert('Your account is still PENDING approval by admin.');</script>";
            exit();
        }

        if ($user['status'] == 'denied') {
            echo "<script>alert('Your registration was DENIED. Contact admin.');</script>";
            exit();
        }

        if ($password == $user['password']) {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['fname']   = $user['fname'];
            $_SESSION['lname']   = $user['lname'];

            switch ($user['role_id']) {

                case 1:  
                    header("Location: Resident_Home.view.php");
                    break;

                case 2:  
                    header("Location: Family_Home.view.php");
                    break;

                case 3:  
                    header("Location: Caregiver_Home.view.php");
                    break;

                case 4:  
                    header("Location: Supervisor_Home.view.php");
                    break;

                case 5:  
                    header("Location: Doctor_Home.view.php");
                    break;

                case 6:  
                    header("Location: Admin_Home.view.php");
                    break;

                case 7:  
                    header("Location: Employee_Home.view.php");
                    break;

                default:
                    header("Location: index.php");
            }

            exit();
        }
        else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    }
    else {
        echo "<script>alert('No account found with that email.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class="paper">
        
        <div class="logo-area">
            <img src="img/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.webp" alt="Old Folks Home Log">
        </div>

        

        <h2 style="text-align:center;">Login</h2>

        <form method="POST">

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>Need an account? <a href="Register.view.php">Register Here</a></p>
        </div>

    </div>
    
</body>
</html>