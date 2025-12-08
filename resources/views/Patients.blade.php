<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients List</title>
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

    <h1>List of Patients</h1>

    <table>
        <tr>
            <th>
                ID
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_id" value="{{ request('search_id') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Name
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_name" value="{{ request('search_name') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Age
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_age" value="{{ request('search_age') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Emergency Contact
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_relation_to_emergency" value="{{ request('search_relation_to_emergency') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Emergency Contact Name
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_emergency_contact" value="{{ request('search_emergency_contact') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
            <th>
                Admission Date
                <br>
                <form method="GET" action="/patients">
                    <input type="text" name="search_admission_date" value="{{ request('search_admission_date') }}" placeholder="Search">
                    <button type="submit">OK</button>
                </form>
            </th>
        </tr>
        @if(isset($patients) && $patients->count())
            @foreach($patients as $p)
                <tr>
                    <td>{{ $p->patient_id }}</td>
                    <td>{{ $p->user->fname ?? '' }} {{ $p->user->lname ?? '' }}</td>
                    <td>{{ $p->age ?? '—' }}</td>
                    <td>{{ $p->relation_to_emergency ?? '—' }}</td>
                    <td>{{ $p->emergency_contact ?? '—' }}</td>
                    <td>{{ $p->admission_date ?? '—' }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No patients found.</td>
            </tr>
        @endif
    </table>
    
</body>
</html>