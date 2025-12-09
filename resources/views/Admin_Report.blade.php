<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missed Activities Report</title>
</head>
<style>
    body {
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
    .msg { color: red; margin-top: 10px; }
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>

    <div class="paper">
        <h1>Missed Activities Report</h1>

        @if($missed->isEmpty())
            <p>No missed activities found.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Medicine</th>
                        <th>Evening Medicine</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($missed as $row)
                        <tr>
                            <td>{{ $row->patient_id }}</td>
                            <td>{{ $row->fname }} {{ $row->lname }}</td>
                            <td>{{ $row->date }}</td>
                            <td class="{{ !$row->morning_medicine ? 'missed' : 'completed' }}">
                                {{ $row->morning_medicine ? 'Completed' : 'Missed' }}</td>
                            <td class="{{ !$row->afternoon_medicine ? 'missed' : 'completed' }}">
                                {{ $row->afternoon_medicine ? 'Completed' : 'Missed' }}</td>
                            <td class="{{ !$row->evening_medicine ? 'missed' : 'completed' }}">
                                {{ $row->evening_medicine ? 'Completed' : 'Missed' }}</td>
                            <td class="{{ !$row->breakfast ? 'missed' : 'completed' }}">
                                {{ $row->breakfast ? 'Completed' : 'Missed' }}</td>
                            <td class="{{ !$row->lunch ? 'missed' : 'completed' }}">
                                {{ $row->lunch ? 'Completed' : 'Missed' }}</td>
                            <td class="{{ !$row->dinner ? 'missed' : 'completed' }}">
                                {{ $row->dinner ? 'Completed' : 'Missed' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>