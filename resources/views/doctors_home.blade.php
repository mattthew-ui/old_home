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
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_patient" value="{{ request('search_patient') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Date
                <br>
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_date" value="{{ request('search_date') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th style="width: 30%;">
                Comment
                <br>
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_comment" value="{{ request('search_comment') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Morning Medicine
                <br>
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_morning" value="{{ request('search_morning') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Afternoon Medicine
                <br>
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_afternoon" value="{{ request('search_afternoon') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Evening Medicine
                <br>
                <form method="GET" action="/doctor/home">
                    <input type="text" name="search_evening" value="{{ request('search_evening') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form
            </th>
        </tr>
        @foreach($appointments as $a)
        <tr>
            <td>
                {{ $a->patient->user->fname }} {{ $a->patient->user->lname }}
                <button onclick="window.location.href='/doctor/patient/{{ $a->patient_id }}'">View</button>
            </td>
            <td>{{ $a->date }}</td>
            <td>{{ $a->comment ?? '—' }}</td>
            <td><input type="checkbox" @if($a->morning_medicine) checked @endif disabled></td>
            <td><input type="checkbox" @if($a->afternoon_medicine) checked @endif disabled></td>
            <td><input type="checkbox" @if($a->evening_medicine) checked @endif disabled></td>
        </tr>
        @endforeach
    </table>

    <br>

    <form method="GET" action="/doctor/home">
        <h2>Upcoming Appointments</h2>
        <label for="date">Till Date</label><br>
        <input type="date" name="date" id="date" value="{{ $tillDate ?? '' }}">
        <input type="submit" value="OK">
    </form>

    <br>

    <table style="width: 20%;">
        <tr>
            <th>Patient</th>
            <th>Date</th>
        </tr>
        @foreach($upcomingAppointments as $a)
        <tr>
            <td>
                {{ $a->patient->user->fname }} {{ $a->patient->user->lname }}
                <button onclick="window.location.href='/doctor/patient/{{ $a->patient_id }}'">View</button>
            </td>
            <td>{{ $a->date }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>