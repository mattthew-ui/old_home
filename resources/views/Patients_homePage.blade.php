<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Home</title>
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
    .center-check{
        text-align: center;
    }
</style>
<body>

    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>

    <h1>Patient Home</h1>

    <form method="GET">
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date" value="{{ $date }}">
        <input type="submit" value="OK">
    </form>

    <br>

    @if($duties)
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
            <td>{{ $doctor->user->fname ?? 'N/A' }} {{ $doctor->user->lname ?? '' }}</td>
            <td class="center-check"><input type="checkbox" disabled></td>
            <td>{{ $caregiver->user->fname ?? 'N/A' }} {{ $caregiver->user->lname ?? '' }}</td>
            <td class="center-check"><input type="checkbox" @if($duties->morning_medicine) checked @endif disabled></td>
            <td class="center-check"><input type="checkbox" @if($duties->afternoon_medicine) checked @endif disabled></td>
            <td class="center-check"><input type="checkbox" @if($duties->evening_medicine) checked @endif disabled></td>
            <td class="center-check"><input type="checkbox" @if($duties->breakfast) checked @endif disabled></td>
            <td class="center-check"><input type="checkbox" @if($duties->lunch) checked @endif disabled></td>
            <td class="center-check"><input type="checkbox" @if($duties->dinner) checked @endif disabled></td>
        </tr>
    </table>
    @else
        <p>No information to display for the selected date.</p>
    @endif
    
</body>
</html>