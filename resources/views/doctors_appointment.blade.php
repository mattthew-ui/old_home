<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
</head>
<body>
    <button type="button" onclick="window.location.href='/new-roster';">New Roster</button>
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>

    <h1>Doctor's Appointment</h1>

    <form>
        <label for="patient_id">Patient ID</label><br>
        <input type="number" name="patient_id"><br><br>

        <label for="date">Date</label><br>
        <input type="date" name="date"><br><br>

        <label for="doctor_id">Doctor</label><br>
        <select>
            <option value="" disabled selected>--</option>
            <option value="1">Name 1</option>
            <option value="2">Name 2</option>
        </select><br><br>

        <label for="patient_name">Patient Name</label><br>
        <input type="text" name="patient_name" placeholder="Enter patient ID to display" disabled><br><br>

        <input type="submit" value="OK">
        <button type="button" onclick="window.location.href='/daily-roster';">Cancel</button> <!-- Program to return to admin/supervisor home page when added -->
    </form>
</body>
</html>