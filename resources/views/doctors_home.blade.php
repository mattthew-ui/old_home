<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home</title>
</head>
<style>
    table{
        width: 100%;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    input[type="text"]{
        width: 30%;
    }
</style>
<body>
    
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>

    <h1>Doctor Home</h1>

    <h2>Appointments</h2>
    <table>
        <tr>
            <th>
                Patient Name
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
            <th>
                Date
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
            <th style="width: 30%;">
                Comment
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
            <th>
                Morning Medicine
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
            <th>
                Afternoon Medicine
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
            <th>
                Evening Medicine
                <br>
                <input type="text" placeholder="Search">
                <input type="button" value="OK">
            </th>
        </tr>
        <tr>
            <td>
                Info
                <button type="button" onclick="window.location.href='/doctor/patient-of-doctor';">View</button>
            </td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
        </tr>
    </table>

    <br>

    <form>
        <h2>Upcoming Appointments</h2>
        <label for="date">Till Date</label><br>
        <input type="date" name="date" id="date">
        <input type="button" value="OK">
    </form>

    <br>

    <table style="width: 20%;">
        <tr>
            <th>Patient</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>
                Info
                <button type="button" onclick="window.location.href='/doctor/patient-of-doctor';">View</button>
            </td>
            <td>Info</td>
        </tr>
    </table>

</body>
</html>