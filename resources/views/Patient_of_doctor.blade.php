<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Patient of Doctor</title> 
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
    #new-prescription-div{ 
        display: none; 
    } 
</style> 
<body>
    <div class="outer-wrap">
        <div class="paper">
            <h1>Patient of Doctor</h1> 

            <h2>Old Prescriptions</h2> 
            <table>
                <tr> 
                    <th>Date</th> 
                    <th style="width: 25%;">Comment</th> 
                    <th>Morning Medicine</th> 
                    <th>Afternoon Medicine</th> 
                    <th>Evening Medicine</th> 
                </tr>

                @foreach($prescriptions as $p) 
                <tr> 
                    <td>{{ $p->date }}</td> 
                    <td>{{ $p->comment }}</td> 
                    <td class="center-check"> 
                        <input type="checkbox" {{ $p->morning_medicine ? 'checked' : '' }} disabled> 
                    </td> 
                    <td class="center-check"> 
                        <input type="checkbox" {{ $p->afternoon_medicine ? 'checked' : '' }} disabled> 
                    </td> 
                    <td class="center-check"> 
                        <input type="checkbox" {{ $p->evening_medicine ? 'checked' : '' }} disabled> 
                    </td> 
                </tr> 
                @endforeach 
            </table> 

            <br> 

            <input type="button" onclick="toggleDiv()" value="New Prescription" 
            {{ $hasAppointmentToday ? '' : 'disabled style=opacity:0.5;cursor:not-allowed;' }}> 

            <br><br> 

            <div id="new-prescription-div"> 
                <hr>
                <br>
                <form method="POST" action="/doctor/patient/{{ $patient->patient_id }}/new-prescription"> 
                    @csrf 
                    <table> 
                        <tr> 
                            <th style="width: 30%;">Comment</th> 
                            <th>Morning Medicine</th> 
                            <th>Afternoon Medicine</th> 
                            <th>Evening Medicine</th> 
                        </tr> 
                        <tr style="text-align: center;"> 
                            <td> 
                                <textarea name="comment"></textarea> 
                            </td> 
                            <td> 
                                <textarea name="morning_medicine"></textarea> 
                            </td> 
                            <td> 
                                <textarea name="afternoon_medicine"></textarea> 
                            </td>
                            <td>
                                <textarea name="evening_medicine"></textarea> 
                            </td> 
                        </tr> 
                    </table> 
                    <input type="submit" value="OK"> 
                    <input type="button" value="Cancel" onclick="toggleDiv()"> 
                </form> 
            </div>
        </div> 
    </div>

    <script> 
        function toggleDiv(){ 
            let div = document.getElementById("new-prescription-div"); 
            if(div.style.display === "none"){ 
                div.style.display = "block"; 
            } 
            else{ 
                div.style.display = "none"; 
            } 
        } 
    </script> 

</body> 
</html> 