<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<style>
    body{
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
</style>
<body>
    <div class="paper">
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
    </div>

</body>
</html>