<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
        .no-spinner::-webkit-outer-spin-button,
        .no-spinner::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .no-spinner {
            -moz-appearance: textfield;
        }
        .error-message { color: red; }
        .valid-message { color: green; }
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
            width: 700px;
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
    </style>
</head>
<body>

    <header>
    <img src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">

    <div class="header-buttons">
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
            <h1>Create Doctor Appointment</h1>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <form action="{{ route('doctor_appointment.store') }}" method="POST" id="appointment_form">
                @csrf
                <label for="patient_id">Patient ID:</label>
                <input type="number" name="patient_id" id="patient_id" required class="no-spinner">
                <span id="patient_status"></span>
                <br>

                <label for="date">Date:</label>
                <input type="date" name="date" id="appointment_date" required><br><br>

                <label for="doctor_id">Doctor:</label>
                <select name="doctor_id" id="doctor_dropdown" required>
                    <option value="">Select date first</option>
                </select><br>

                <button type="submit">Create Appointment</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#patient_id').on('blur', function() {
                let patientId = $(this).val();
                if(patientId){
                    $.ajax({
                        url: "{{ route('doctor_appointment.validate_patient') }}",
                        type: "GET",
                        data: { patient_id: patientId },
                        success: function(data) {
                            if(data.valid){
                                $('#patient_status').text('Valid patient').removeClass('error-message').addClass('valid-message');
                            } else {
                                $('#patient_status').text('Invalid or unapproved patient').removeClass('valid-message').addClass('error-message');
                            }
                        }
                    });
                } else {
                    $('#patient_status').text('');
                }
            });
            $('#appointment_date').on('change', function() {
                let selectedDate = $(this).val();
                if(selectedDate) {
                    $.ajax({
                        url: "{{ route('doctor_appointment.get_doctors') }}",
                        type: "GET",
                        data: { date: selectedDate },
                        success: function(data) {
                            let dropdown = $('#doctor_dropdown');
                            dropdown.empty();
                            if(data.length > 0){
                                dropdown.append('<option value="">-- Select Doctor --</option>');
                                $.each(data, function(key, doctor) {
                                    dropdown.append('<option value="'+doctor.employee_id+'">'+doctor.fname+' '+doctor.lname+'</option>');
                                });
                            } else {
                                dropdown.append('<option value="">No doctors on roster</option>');
                            }
                        }
                    });
                }
            });
            $('#appointment_form').on('submit', function(e) {
                if($('#patient_status').hasClass('error-message')){
                    e.preventDefault();
                    alert('Please enter a valid approved patient ID.');
                }
            });
        });
    </script>
</body>
</html>