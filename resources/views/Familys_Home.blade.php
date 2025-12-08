<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Home</title>
</head>
<style> 
    table{ 
        width: 100%; 
    } 
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
    .center-check{ 
        text-align: center; 
    } 
</style> 
<body>

    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button> 

    <h1>Family Member's Home</h1>

    <div>
        <h2>Sign In</h2>
        <form>
            <label for="family_code">Family Code</label><br>
            <input type="text" name="family_code"><br><br>
            <label for="patient_id">Patient ID</label><br>
            <input type="number" name="patient_id"><br><br>

            <input type="submit" value="OK"> 
            <button type="button" onclick="window.location.href='/daily-roster';">Cancel</button> 
        </form>
    </div>

    <br>

    <form>
        <label for="date">Date</label><br>
        <input type="date">
        <input type="submit" value="OK">
    </form>

    <h2>Patient Information</h2>

    <table>
        <tr>
            <th>Doctor's Name</th>
            <th>Doctor's Appointment</th>
            <th>Caregiver's Name</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Evening Medicine</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
        </tr>
        <tr>
            <td>Info</td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td>Info</td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td class="center-check"><input type="checkbox" disabled></td>
        </tr>
    </table>

</body>
</html>