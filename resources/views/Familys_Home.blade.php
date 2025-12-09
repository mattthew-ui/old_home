<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Home</title>
</head>
<style>
    * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
    body{
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
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
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
    
<header>
    <img src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">

    <div class="header-buttons">
      <button onclick ="window.location ='{{ route('roster.daily') }}'">Daily Roster</button>
        <button onclick ="window.location ='{{ route('admin_report') }}'">LOG OUT</button>
    </div>
  </header>

    <div class="outer-wrap">
        <div class="paper">
            <h1>Family Home</h1>

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
            @endif
        </div>
    </div>

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