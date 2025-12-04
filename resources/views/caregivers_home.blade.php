<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Home</title>
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
    
    <h1>Caregiver Home Page</h1>

    <h2>List of Patient Duties Today</h2>

    <table>
        <tr>
            <th style="width: 30%;">Patient Name</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Evening Medicine</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
        </tr>
        <tr>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
        </tr>
    </table>

</body>
</html>