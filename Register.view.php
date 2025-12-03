<?php

$conn = new mysqli("localhost", "root", "", "OldHomeManagement");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $role_id  = $_POST['role'];
    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $dob      = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(role_id, fname, lname, email, phone, password, date_of_birth, status)
            VALUES('$role_id', '$fname', '$lname', '$email', '$phone', '$password', '$dob', 'pending')";

    if ($conn->query($sql)) {

        echo "
        <script>
            alert('Registration submitted. Your account must be approved by Admin before login.');
            window.location='login.view.php';
        </script>
        ";
        exit();
    } 
    else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="paper">
        <div class="logo-area">
                <img src="img/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.webp" alt="Old Folks Home Log">
            </div>
            <h2 style="text-align:center;">Register Account</h2>

        <form method="POST">

            <label>First Name</label>
            <input type="text" name="fname" required>

            <label>Last Name</label>
            <input type="text" name="lname" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Phone</label>
            <input type="text" name="phone">

            <label>Date of Birth</label>
            <input type="date" name="dob">

            <label>Role</label>
            <select name="role" id="roleSelect" required>
                <option value="">-- Select Role --</option>
                <option value="1">Resident</option>
                <option value="2">Family Member</option>
                <option value="3">Caregiver</option>
                <option value="4">Supervisor</option>
                <option value="5">Doctor</option>
                <option value="6">Admin</option>
                <option value="7">Employee</option>
            </select>

            <div id="residentFields" style="display:none;">
                <label>Age</label>
                <input type="number" name="age">

                <label>Family Code</label>
                <input type="text" name="family_code">

                <label>Emergency Contact</label>
                <input type="text" name="emergency">

                <label>Relation to Emergency Contact</label>
                <input type="text" name="relation">

            <label>Group Name</label>
                <input type="text" name="group_name">

                <label>Admission Date</label>
                <input type="date" name="admission_date">
            </div>

            <div id="familyFields" style="display:none;">
                <label>Family Code</label>
                <input type="text" name="family_code">

                <label>Patient ID</label>
                <input type="number" name="patient_id">
            </div>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Register</button>

        </form>


            
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Old Folks Home Management System
            </div>p echo date("Y"); ?> Old Folks Home Management System
    </div>
<script>
    document.getElementById("roleSelect").addEventListener("change", function() {
        let role = this.value;

        document.getElementById("residentFields").style.display = (role == "1") ? "block" : "none";
        document.getElementById("familyFields").style.display   = (role == "2") ? "block" : "none";
    });
</script>
</body>
</html>