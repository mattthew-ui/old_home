<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Caregiver Home</title> 
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
</style> 
<body>

    <header>
    <img src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">

    <div class="header-buttons">
      <button onclick ="window.location ='{{ route('roster.daily') }}'">Daily Roster</button>
        <button onclick ="window.location ='{{ route('patients') }}'">Patients</button>
        <button onclick ="window.location ='{{ route('admin_report') }}'">LOG OUT</button>
    </div>
  </header>

    <div class="outer-wrap">
        <div class="paper">

        <h1>Caregiver Home</h1> 

        <h2>List of Patient Duties Today</h2> 

        <form method="POST" action="/caregiver/update"> 
        @csrf 
        <table> 
            <tr> 
                <th style="width: 30%;">Patient Name</th> 
                <th>Morning Medicine</th> 
                <th>Afternoon Medicine</th> 
                <th>Evening Medicine</th> 
                <th>Breakfast</th> 
                <th>Lunch</th> 
                <th>Dinner</th> 
            </tr> 

            @foreach($duties as $d) 
            <tr> 
                <td>{{ $d->patient->user->fname }} {{ $d->patient->user->lname }}</td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][morning_medicine]" 
                    {{ $d->morning_medicine ? "checked" : "" }}> 
                </td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][afternoon_medicine]" 
                    {{ $d->afternoon_medicine ? "checked" : "" }}> 
                </td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][evening_medicine]" 
                    {{ $d->evening_medicine ? "checked" : "" }}> 
                </td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][breakfast]" 
                    {{ $d->breakfast ? "checked" : "" }}> 
                </td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][lunch]" 
                    {{ $d->lunch ? "checked" : "" }}> 
                </td> 
                <td class="center-check"> 
                    <input type="checkbox" name="duties[{{ $d->duty_id }}][dinner]" 
                    {{ $d->dinner ? "checked" : "" }}> 
                </td> 
            </tr> 
            @endforeach 
            @if($duties->isEmpty()) 
                <tr> 
                    <td colspan="7" style="text-align: center;">No duties assigned for today.</td> 
                </tr> 
            @endif 
        </table>
        </form>
        </div>
    </div>

</body> 
</html> 