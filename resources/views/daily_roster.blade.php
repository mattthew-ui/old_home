<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Roster</title>
</head>
<style>
    table{
        width: 100%;
    }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <button type="button" onclick="window.location.href='/new-roster';">New Roster</button>
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>
    
    <h1>Daily Roster</h1>

    <form>
        <label>Date</label><br>
        <input type="date" value="<?php echo date('Y-m-d');?>">
        <input type="submit" value="OK">
    </form>

    <br>

    <table>
        <tr>
            <th>Supervisor</th>
            <th>Doctor</th>
            <th>Caregiver 1</th>
            <th>Caregiver 2</th>
            <th>Caregiver 3</th>
            <th>Caregiver 4</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>Name</td>
            <td>Name</td>
            <td>Name</td>
            <td>Name</td>
            <td>Name</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Patient Group</td>
            <td>Patient Group</td>
            <td>Patient Group</td>
            <td>Patient Group</td>
        </tr>
    </table>

</body>
</html>