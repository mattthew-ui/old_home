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
    
    <h1>Doctor Home</h1>

    <table>
        <tr>
            <th>
                Name
                <input type="button" value="Next">
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
            <th>
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
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
        </tr>
    </table>

    <br>

    <form>
        <label for="date">Appointments</label><br>
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
            <td>Info</td>
            <td>Info</td>
        </tr>
    </table>

</body>
</html>