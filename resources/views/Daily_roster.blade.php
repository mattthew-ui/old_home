<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daily Roster</title> 
</head> 
<style> 
    table{ 
        width: 100%; 
    } 
    table, th, td{ 
        border: 1px solid black; 
        border-collapse: collapse; 
    } 
</style> 
<body> 
    <button type="button" onclick="window.location.href='/new-roster';">New Roster</button> 
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button> 

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
        <tr> 
            <td></td> 
            <td></td> 
            <td>Patient Group</td> 
            <td>Patient Group</td> 
            <td>Patient Group</td> 
            <td>Patient Group</td> 
        </tr> 
    </table> 
    @else 
        <p>No roster found for this date.</p> 
    @endif 

</body> 
</html> 