<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Caregiver Home</title> 
</head> 
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
    <div class="paper">

    <h1>Caregiver's Home</h1> 

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

</body> 
</html> 