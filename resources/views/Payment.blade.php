<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>

    <h2 style="text-align:center;">Payment</h2>

    @if(session('message'))
        <div style="color:red;">{{ session('message') }}</div>
    @endif

    @php
        $patient = session('patient');
    @endphp

    {{-- SEARCH FORM --}}
    <form action="{{ route('payment.search') }}" method="POST">
        @csrf
        <label>Patient ID</label>
        <input type="number" name="patient_id" required>
        <button type="submit">Search</button>
    </form>

    @if($patient)
        <hr>
        <label>Patient Name</label>
        <input type="text" value="{{ $patient->fname }} {{ $patient->lname }}" readonly>

        <label>Total Due ($)</label>
        <input type="text" value="{{ $patient->total_due }}" readonly>

        {{-- UPDATE BILL --}}
        <form action="{{ route('payment.updateBill') }}" method="POST">
            @csrf
            <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
            <button type="submit">Update Bill</button>
        </form>

        {{-- NEW PAYMENT --}}
        <form action="{{ route('payment.newPayment') }}" method="POST">
            @csrf
            <input type="hidden" name="patient_id" value="{{ $patient->patient_id }}">
            <label>New Payment Amount</label>
            <input type="number" name="amount" required>
            <button type="submit">Submit Payment</button>
        </form>
    @endif

</body>
</html>