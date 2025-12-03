<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
</head>
<body>
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>

    <h1>Doctor's Appointment</h1>

    <form method="POST" action="/doctor-appointment">
        @csrf
        <label for="patient_id">Patient ID</label><br>
        <input type="number" name="patient_id" required><br><br>

        <label for="date">Date</label><br>
        <input type="date" name="date" required><br><br>

        <label for="doctor_id">Doctor</label><br>
        <select name="doctor_id" required>
            <option value="" disabled selected>--</option>
            @foreach($doctors as $doc)
                <option value="{{ $doc->employee_id }}">
                    {{ $doc->user->fname }} {{ $doc->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="patient_name">Patient Name</label><br>
        <input type="text" name="patient_name" disabled><br><br>

        <input type="submit" value="OK">
        <button type="button" onclick="window.location.href='/daily-roster';">Cancel</button> <!-- Program to return to admin/supervisor home page when added -->
    </form>

<script>
    document.querySelector("input[name='patient_id']").addEventListener("input", function() {
        let patientId = this.value;
        if(patientId === ""){
            document.querySelector("input[name='patient_name']").value = "";
            return;
        }
        fetch(`/get-patient-name/${patientId}`)
            .then(response =>response.json())
            .then(data =>{document.querySelector("input[name='patient_name']").value = data.name ?? "???";});
    });
</script>

</body>
</html>