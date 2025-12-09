<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Home</title>
</head>
<style>
    body{
        background: #3d2f1d;    
        font-family: "Georgia", serif;
    }
    * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
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
        width: 900px;
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
        <button onclick ="window.location ='{{ route('patients') }}'">Patients</button>
        <button onclick ="window.location ='{{ route('admin_report') }}'">LOG OUT</button>
    </div>
  </header>

    <div class="outer-wrap">
        <div class="paper">

            <h1 style="text-align: center;">Doctor Home</h1>
            <p style="text-align: center;">Welcome, doctor!</p>

            <h2>Appointments</h2>
            <table>
                <tr>
                    <th>
                        Patient Name
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_patient" value="{{ request('search_patient') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form>
                    </th>
                    <th>
                        Date
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_date" value="{{ request('search_date') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form>
                    </th>
                    <th style="width: 30%;">
                        Comment
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_comment" value="{{ request('search_comment') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form>
                    </th>
                    <th>
                        Morning Medicine
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_morning" value="{{ request('search_morning') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form>
                    </th>
                    <th>
                        Afternoon Medicine
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_afternoon" value="{{ request('search_afternoon') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form>
                    </th>
                    <th>
                        Evening Medicine
                        <br>
                        <form method="GET" action="/doctor/home">
                            <input type="text" name="search_evening" value="{{ request('search_evening') }}" placeholder="Search">
                            <button type="submit">OK</button>
                        </form
                    </th>
                </tr>
                @foreach($appointments as $a)
                <tr>
                    <td>
                        {{ $a->patient->user->fname }} {{ $a->patient->user->lname }}
                        <button onclick="window.location.href='/doctor/patient/{{ $a->patient_id }}'">View</button>
                    </td>
                    <td>{{ $a->date }}</td>
                    <td>{{ $a->comment ?? '—' }}</td>
                    <td class="center-check"><input type="checkbox" @if($a->morning_medicine) checked @endif disabled></td>
                    <td class="center-check"><input type="checkbox" @if($a->afternoon_medicine) checked @endif disabled></td>
                    <td class="center-check"><input type="checkbox" @if($a->evening_medicine) checked @endif disabled></td>
                </tr>
                @endforeach
            </table>

            <br>

            <form method="GET" action="/doctor/home">
                <h2>Upcoming Appointments</h2>
                <label for="date">Till Date</label><br>
                <input type="date" name="date" id="date" value="{{ $tillDate ?? '' }}">
                <input type="submit" value="OK">
            </form>

            <br>

            <table>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                </tr>
                @foreach($upcomingAppointments as $a)
                <tr>
                    <td>
                        {{ $a->patient->user->fname }} {{ $a->patient->user->lname }}
                        <button onclick="window.location.href='/doctor/patient/{{ $a->patient_id }}'">View</button>
                    </td>
                    <td>{{ $a->date }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>