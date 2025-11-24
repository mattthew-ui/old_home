<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient of Doctor</title>
</head>
<style>
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

    <button type="button" onclick="window.location.href='/doctor/home';">Back</button>
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
            <td>{{ $p->morning_medicine ? 'Yes' : 'No' }}</td>
            <td>{{ $p->afternoon_medicine ? 'Yes' : 'No' }}</td>
            <td>{{ $p->evening_medicine ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach
    </table>

    <br>

    <input type="button" onclick="toggleDiv()" value="New Prescription">

    <br><br>

    <div id="new-prescription-div">
        <form>
            <table style="width: 70%;">
                <tr>
                    <th style="width: 30%;">Comment</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Evening Medicine</th>
                </tr>
                <tr style="text-align: center;">
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                    <td>
                        <textarea></textarea>
                    </td>
                </tr>
            </table>
            <input type="button" value="OK"><input type="button" value="Cancel">
        </form>
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