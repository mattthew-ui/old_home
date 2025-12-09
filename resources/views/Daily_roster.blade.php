<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daily Roster</title> 
</head> 
<style>
    body{
        background: #3d2f1d;    
        font-family: "Georgia", serif;
    }
    .outer-wrap{
        display: flex;
        justify-content: center;
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
    table{ 
        width: 100%; 
    } 
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
</style> 
<body> 
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