<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Home</title>
</head>
<style>
    body{
        background: #3d2f1d;    
        display: flex;
        justify-content: center;
        padding: 40px;
        font-family: "Georgia", serif;
    }
    .paper {
        width: 700px;
        background: #f5e6c8;
        padding: 40px;
        border-radius: 10px;
        box-shadow:
            0 0 40px 10px rgba(0,0,0,0.6),
            inset 0 0 50px rgba(0,0,0,0.4);
    }
    label { font-weight: bold; display: block; margin-top: 15px; }
    input {
        width: 100%;
        padding: 7px;
        margin-top: 5px;
    }
    button {
        margin-top: 20px;
        padding: 10px 15px;
        background: brown;
        color: white;
        border: none;
        cursor: pointer;
    }
    input[type="button"]{
        margin-top: 20px;
        padding: 10px 15px;
        background: brown;
        color: white;
        border: none;
        cursor: pointer;
        width: auto;
    }
    .msg { color: red; margin-top: 10px; } 
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
    <div class="paper">
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
    </div>
    
</body>
</html>