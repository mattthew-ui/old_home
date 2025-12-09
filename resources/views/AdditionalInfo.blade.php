<!DOCTYPE html>
<html>
<head>
    <title>Patient Information Lookup</title>
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
        .msg { color: red; margin-top: 10px; }
    </style>
</head>
<body>
    <header>
    </header>

    <div class="paper">
        <h1>Patient Information Lookup</h1>
        <form method="GET" action="{{ route('Additional_Info') }}">
            @csrf
            <label for="patient_id">Patient ID:</label>
            <input type="text" name="patient_id" placeholder="Enter patient ID" value="{{ request('patient_id') }}" required>
            <button type="submit">Search</button>
        </form>

        @if(isset($patient))
            @if($patient)
                <h2>Patient Details</h2>
                <p>Patient ID: {{ $patient->patient_id }}</p>
                <p>First Name: {{ $patient->fname }}</p>
                <p>Last Name: {{ $patient->lname }}</p>
                <p>Group: {{ $patient->group_name }}</p>
                <p>Admission Date: {{ $patient->admission_date }}</p>
            @else
                <p>No approved patient found with that ID.</p>
            @endif
        @endif
    </div>

</body>
</html>