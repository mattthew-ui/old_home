<!-- resources/views/AdditionalInfo.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Patient Information Lookup</title>
</head>
<body>

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

</body>
</html>
