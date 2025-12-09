<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daily Roster</title> 
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
    table{ 
        width: 100%; 
    } 
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
    input[type="text"]{ 
        width: 30%; 
    } 
    .center-check{ 
        text-align: center; 
    } 
    table{ 
        width: 100%; 
    } 
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
        <button onclick ="window.location ='{{ route('payment.index') }}'">Payment</button>
        <button onclick="window.location='{{ route('home') }}'">LOG OUT</button>
    </div>
  </header>

    <div class="outer-wrap">
        <div class="paper">
            <h1>Daily Roster</h1> 

            <form method="GET"> 
                <label>Date</label><br> 
                <input type="date" name="date" value="{{ $date }}"> 
                <input type="submit" value="OK"> 
            </form> 

            <br> 

            @if ($roster) 
            <table> 
                <tr> 
                    <th>Supervisor</th> 
                    <th>Doctor</th> 
                    <th>Caregiver 1</th> 
                    <th>Caregiver 2</th> 
                    <th>Caregiver 3</th> 
                    <th>Caregiver 4</th> 
                </tr> 
                <tr>
                    <td>{{ $roster->supervisor->user->fname ?? '' }} {{ $roster->supervisor->user->lname ?? '' }}</td> 
                    <td>{{ $roster->doctor->user->fname ?? '' }} {{ $roster->doctor->user->lname ?? '' }}</td> 
                    <td>{{ optional($roster->caregiver1->user)->fname }} {{ optional($roster->caregiver1->user)->lname }}</td> 
                    <td>{{ optional($roster->caregiver2->user)->fname }} {{ optional($roster->caregiver2->user)->lname }}</td> 
                    <td>{{ optional($roster->caregiver3->user)->fname }} {{ optional($roster->caregiver3->user)->lname }}</td> 
                    <td>{{ optional($roster->caregiver4->user)->fname }} {{ optional($roster->caregiver4->user)->lname }}</td> 
                </tr>
            </table> 
            @else 
                <p>No roster found for this date.</p> 
            @endif 
        </div>
    </div>

</body> 
</html> 