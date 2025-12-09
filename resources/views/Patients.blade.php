<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients List</title>
</head>
<style>
    body{
        background: #3d2f1d;    
        font-family: "Georgia", serif;
    }
    .outer-wrap{
            display: flex;
            justify-content: center;
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
</style>
<body>

    <div class="outer-wrap">
        <div class="paper">
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
        </div>
    </div>
    
</body>
</html>