<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missed Activities Report</title>
</head>
<style>
    * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
    body {
        background: #3d2f1d;    
        font-family: "Georgia", serif;
    }
    .outer-wrap{
        display: flex;
        justify-content: center;
    }
    .paper {
        margin-top: 160px;
        width: 900px;
        background: #f5e6c8;
        padding: 40px;
        border-radius: 10px;
        box-shadow:
            0 0 40px 10px rgba(0,0,0,0.6),
            inset 0 0 50px rgba(0,0,0,0.4);
    }
      header{
    background-color: #f5e6c8;
    border-bottom: 1px solid #3d2f1d;
    width: 100%;
    height: 120px;
    position: fixed;
    top: 0;
    left: 0;

    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;

    box-shadow: 0 0 40px 10px rgba(0,0,0,0.1),
                0 0 50px rgba(0,0,0,0);
    background-image:
        radial-gradient(rgba(0,0,0,0.2) 1px, transparent 1px),
        linear-gradient(0deg, #f1ddba, #f5e6c8);
    background-size: 4px 4px, 100%;
  }

  header img{
    height: 100px;
  }

  .header-buttons{
    display: flex; 
    gap: 15px;
  }

  .header-buttons button {
      padding: 10px 15px;
      background: brown;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      white-space: nowrap;
  }
    label { font-weight: bold; display: block; margin-top: 15px; }
    input {
        width: 100%;
        padding: 7px;
        margin-top: 5px;
    }
    button {
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

    <header>
    <img src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">

    <div class="header-buttons">
        <button onclick ="window.location ='{{ route('roster.daily') }}'">Daily Roster</button>
        <button onclick ="window.location ='{{ route('AdminApproval') }}'">Register Requests</button>
        <button onclick ="window.location ='{{ route('RoleCreation') }}'">Role Creation</button>
        <button onclick ="window.location ='{{ route('EmployeeList')}}'">Employee List</button>
        <button onclick ="window.location ='{{ route('Additional_Info') }}'">Patient Info</button>
        <button onclick ="window.location ='{{ route('roster.new') }}'">New Roster</button>
        <button onclick ="window.location ='{{ route('doctor_appointment.create') }}'">Doctor Appt</button>
        <button onclick ="window.location ='{{ route('admin_report') }}'">Admin Report</button>
    </div>
  </header>

    <div class="outer-wrap">
        <div class="paper">
            <h1 style="text-align: center;">Missed Activities Report</h1>

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
    </div>
</body>
</html>