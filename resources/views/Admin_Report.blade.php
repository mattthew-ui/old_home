<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missed Activities Report</title>
</head>
<body>

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
</body>
</html>