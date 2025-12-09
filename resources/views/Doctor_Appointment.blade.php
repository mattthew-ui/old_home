<!DOCTYPE html>
<html>
<head>
    <title>Doctor Appointment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
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
    </style>
</head>
<body>
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