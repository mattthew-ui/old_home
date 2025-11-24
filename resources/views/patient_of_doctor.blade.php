<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient of Doctor</title>
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

    <button type="button" onclick="window.location.href='/doctor/home';">Back</button>
    <h1>Patient of Doctor</h1>

    <h2>Old Prescriptions</h2>
    <table>
        <tr>
            <th>Date</th>
            <th style="width: 25%;">Comment</th>
            <th>Morning Medicine</th>
            <th>Afternoon Medicine</th>
            <th>Evening Medicine</th>
        </tr>
        <tr>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
            <td>Info</td>
        </tr>
    </table>

    <br>

    <input type="button" value="New Prescription">

    <br><br>

    <div {{-- style="visibility: hidden;" --}}>
        <form>
            <table style="width: 70%;">
                <tr>
                    <th style="width: 30%;">Comment</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Evening Medicine</th>
                </tr>
                <tr style="text-align: center;">
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                </tr>
            </table>
            <input type="button" value="OK"><input type="button" value="Cancel">
        </form>
    </div>

</body>
</html>