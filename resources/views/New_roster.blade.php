<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Create New Roster</title>
    <style>
        body {
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
        .msg { color: red; margin-top: 10px; }
    </style>
</head> 
<body> 
    <div class="outer-wrap">
        <div class="paper">
            <h1>Create New Roster</h1>

            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <form action="{{ route('roster.store') }}" method="POST">
                @csrf
                <label for="date">Date:</label>
                <input type="date" name="date" required><br><br>

                <label>Supervisor:</label>
                <select name="supervisor_id" required>
                    <option value=""> Select Supervisor </option>
                    @foreach($supervisors as $sup)
                        <option value="{{ $sup->employee_id }}">{{ $sup->fname }} {{ $sup->lname }}</option>
                    @endforeach
                </select><br><br>

                <label>Doctor:</label>
                <select name="doctor_id" required>
                    <option value=""> Select Doctor </option>
                    @foreach($doctors as $doc)
                        <option value="{{ $doc->employee_id }}">{{ $doc->fname }} {{ $doc->lname }}</option>
                    @endforeach
                </select><br><br>

                @foreach(['A', 'B', 'C', 'D'] as $group)
                    <h3>Group {{ $group }}</h3>
                    <label>Caregiver:</label>
                    <select class="caregiver-select" name="groups[{{ $group }}][caregiver_id]" required>
                        <option value=""> Select Caregiver </option>
                        @foreach($caregivers as $care)
                            <option value="{{ $care->employee_id }}">{{ $care->fname }} {{ $care->lname }}</option>
                        @endforeach
                    </select>
                    <hr>
                @endforeach

                <button type="submit">Save Rosters</button>
            </form>
        </div>
    </div>

    <script>
        const selects = document.querySelectorAll('.caregiver-select');
        selects.forEach(select => {
            select.addEventListener('change', function() {
                const selectedValues = Array.from(selects).map(s => s.value).filter(v => v !== '');
                
                selects.forEach(s => {
                    const currentValue = s.value;
                    Array.from(s.options).forEach(option => {
                        if(option.value === '') return;
                        if(option.value !== currentValue && selectedValues.includes(option.value)){
                            option.disabled = true;
                        } else {
                            option.disabled = false;
                        }
                    });
                });
            });
        });
    </script> 

</body> 
</html>