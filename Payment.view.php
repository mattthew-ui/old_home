<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "OldHomeManagement");

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 6) {
    echo "Access denied. Admin only.";
    exit;
}

$message = "";
$total_due = "";
$patientname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    if (isset($_POST['search'])) {

        $pid = intval($_POST['patient_id']);

        $sql = "SELECT p.patient_id, u.fname, u.lname, pay.total_due, pay.last_update
                FROM patients p
                JOIN users u ON p.patient_id = u.user_id
                LEFT JOIN payments pay ON pay.patient_id = p.patient_id
                WHERE p.patient_id = $pid";

        $res = $mysqli->query($sql);

        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            $patientname = $row['fname'] . " " . $row['lname'];
            $total_due   = $row['total_due'];
            $last_update = $row['last_update'];
        } else {
            $message = "Invalid Patient ID.";
        }
    }

    if (isset($_POST['update_bill'])) {

        $pid = intval($_POST['patient_id']);

        $check = $mysqli->query("SELECT total_due, last_update 
                                 FROM payments WHERE patient_id = $pid");

        if ($check->num_rows == 1) {

            $row = $check->fetch_assoc();
            $last = $row['last_update'];
            $today = date('Y-m-d');
            $days = (strtotime($today) - strtotime($last)) / 86400;

            if ($days > 0) {

                $charge = $days * 10;

                $appt = $mysqli->query(
                    "SELECT COUNT(*) AS c FROM doctors_appointments 
                     WHERE patient_id = $pid 
                     AND date > '$last' AND date <= '$today'"
                )->fetch_assoc()['c'];

                $charge += $appt * 50;

                $med = $mysqli->query(
                    "SELECT COUNT(*) AS c FROM caregiver_duties
                     WHERE patient_id = $pid
                     AND date > '$last' AND date <= '$today'"
                )->fetch_assoc()['c'];

                $charge += $med * 5;


                $mysqli->query(
                    "UPDATE payments SET 
                        total_due = total_due + $charge,
                        last_update = '$today'
                     WHERE patient_id = $pid"
                );

                $message = "Bill updated successfully!";
            } else {
                $message = "Bill already up to date.";
            }

        } else {
            $message = "Patient not found in payments table.";
        }
    }

    if (isset($_POST['new_payment'])) {

        $pid = intval($_POST['patient_id']);
        $amount = intval($_POST['amount']);

        $mysqli->query(
            "UPDATE payments SET total_due = total_due - $amount 
             WHERE patient_id = $pid"
        );

        $message = "Payment Recorded!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="paper">

        <div class="logo-area">
            <img src="img/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.webp">
        </div>

        <h2 style="text-align:center;">Payment</h2>

        <?php if ($message != "") echo "<div class='msg'>$message</div>"; ?>

        <form method="POST">

            <label>Patient ID</label>
            <input type="number" name="patient_id" required>

            <button name="search">Search</button>

            <?php if ($patientname != ""): ?>

                <label>Patient Name</label>
                <input type="text" value="<?= $patientname ?>" readonly>

                <label>Total Due ($)</label>
                <input type="text" value="<?= $total_due ?>" readonly>

                <button name="update_bill">Update Bill</button>

                <label>New Payment Amount</label>
                <input type="number" name="amount">

                <button name="new_payment">Submit Payment</button>

            <?php endif; ?>

        </form>

        <div style="text-align:center; margin-top:20px;">
            © <?= date("Y"); ?> Old Folks Home Management System
        </div>
    </div>
    
</body>
</html>