<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Home</title>
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
        .button-wrap{
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }
    </style>
</head>
<body>

  <div class="paper">
    <h1>Admin Home</h1>

    <div class="button-wrap">
      <button class = "btn" onclick ="window.location ='{{ route('AdminApproval') }}'">View Register Requests</button>
      <button class = "btn" onclick ="window.location ='{{ route('RoleCreation') }}'">Role Creation</button>
      <button class = "btn" onclick ="window.location ='{{ route('EmployeeList')}}'">Employee List</button>
      <button class = "btn" onclick ="window.location ='{{ route('Additional_Info') }}'">Additional Patient Info</button>
      <button class = "btn" onclick ="window.location ='{{ route('roster.new') }}'">Create New Roster</button>
      <button class = "btn" onclick ="window.location ='{{ route('doctor_appointment.create') }}'">Create Doctor Appointment</button>
      <button class ="btn" onclick ="window.location ='{{ route('admin_report') }}'">Admin Report</button>
    </div>
  </div>

</body>
</html>