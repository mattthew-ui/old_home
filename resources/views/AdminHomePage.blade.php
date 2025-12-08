
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Home</title>
</head>
<body>

  <h1>Admin Home</h1>

  <button class = "btn" onclick ="window.location ='{{ route('AdminApproval') }}'">View Register Requests</button>
  <button class = "btn" onclick ="window.location ='{{ route('RoleCreation') }}'">Role Creation</button>
  <button class = "btn" onclick ="window.location ='{{ route('EmployeeList')}}'">Employee List</button>
  <button class = "btn" onclick ="window.location ='{{ route('Additional_Info') }}'">Additional Patient Info</button>
  <button class = "btn" onclick ="window.location ='{{ route('roster.new') }}'">Create New Roster</button>
  <button class = "btn" onclick ="window.location ='{{ route('doctor_appointment.create') }}'">Create Doctor Appointment</button>
  <button class ="btn" onclick ="window.location ='{{ route('admin_report') }}'">Admin Report</button>

</body>
</html>