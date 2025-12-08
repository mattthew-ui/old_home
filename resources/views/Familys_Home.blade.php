<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Home</title>
</head>
<style> 
    table{ 
        width: 100%; 
    } 
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
    .center-check{ 
        text-align: center; 
    } 
</style> 
<body>

    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button> 

    <h1>Family Member's Home</h1>

    <h2>Sign In</h2>
    <form id="signin-form" method="GET" action="/family/home">
        <label for="family_code">Family Code</label><br>
        <input type="password" name="family_code" value="{{ $familyCode ?? '' }}"><br><br>
        <label for="patient_id">Patient ID</label><br>
        <input type="number" name="patient_id" value="{{ $patientId ?? '' }}"><br><br>

        <input type="submit" value="OK"> 
        <button type="button" id="signin-cancel">Cancel</button> 
    </form>

    <br>

    @if($patient)
        <div id="patient-section">
        <form id="date-form" method="GET" action="/family/home">
            <input type="hidden" name="family_code" value="{{ $familyCode }}">
            <input type="hidden" name="patient_id" value="{{ $patientId }}">
            <label for="date">Date</label><br>
            <input type="date" name="date" value="{{ $date }}">
            <input type="submit" value="OK">
        </form>

        <h2>Patient Information</h2>

        @if($duties)
        <table>
            <tr>
                <th>Doctor's Name</th>
                <th>Doctor's Appointment</th>
                <th>Caregiver's Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Evening Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>
            <tr>
                <td>{{ $doctor->user->fname ?? 'N/A' }} {{ $doctor->user->lname ?? '' }}</td>
                <td class="center-check"><input type="checkbox" disabled></td>
                <td>{{ $caregiver->user->fname ?? 'N/A' }} {{ $caregiver->user->lname ?? '' }}</td>
                <td class="center-check"><input type="checkbox" @if($duties->morning_medicine) checked @endif disabled></td>
                <td class="center-check"><input type="checkbox" @if($duties->afternoon_medicine) checked @endif disabled></td>
                <td class="center-check"><input type="checkbox" @if($duties->evening_medicine) checked @endif disabled></td>
                <td class="center-check"><input type="checkbox" @if($duties->breakfast) checked @endif disabled></td>
                <td class="center-check"><input type="checkbox" @if($duties->lunch) checked @endif disabled></td>
                <td class="center-check"><input type="checkbox" @if($duties->dinner) checked @endif disabled></td>
            </tr>
        </table>
        @else
            <p>No information to display for the selected date.</p>
        @endif
        </div>
    @else
        <p>Please enter a valid family code and patient ID to view information.</p>
    @endif

</body>
<script>
    (function(){
        var cancelBtn = document.getElementById('signin-cancel');
        if(!cancelBtn) return;
        cancelBtn.addEventListener('click', function(func){
            func.preventDefault();
            let familyInput = document.querySelector('#signin-form input[name="family_code"]');
            let patientInput = document.querySelector('#signin-form input[name="patient_id"]');
            if(familyInput) familyInput.value = '';
            if(patientInput) patientInput.value = '';

            let patientSection = document.getElementById('patient-section');
            if(patientSection) patientSection.style.display = 'none';

            if(window.history && window.history.replaceState){
                window.history.replaceState(null, '', '/family/home');
            }
        });
    })();
</script>
</html>