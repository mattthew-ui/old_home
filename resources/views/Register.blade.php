<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
        .logo-area {
            width: 180px;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo-wrap{
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        label { font-weight: bold; display: block; margin-top: 15px; }
        input, select {
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

<div class="paper">

    <div class="logo-wrap">
        <img class="logo-area" src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">
    </div>

    <h2 style="text-align:center;">Register</h2>

    {{-- SUCCESS OR ERROR MESSAGE --}}
    @if(session('message'))
        <div class="msg">{{ session('message') }}</div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="msg">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>First Name</label>
        <input type="text" name="fname" required>

        <label>Last Name</label>
        <input type="text" name="lname" required>

        <label>Email</label>
        <input type="email" name="email" required autocomplete="off">

        <label>Phone</label>
        <input type="text" name="phone">

        <label>Date of Birth</label>
        <input type="date" name="dob">

        <label>Role</label>
        <select name="role" id="roleSelect" required>
            <option value="">-- Select Role --</option>
            <option value="1">Admin</option>
            <option value="2">Supervisor</option>
            <option value="3">Doctor</option>
            <option value="4">Caregiver</option>
            <option value="5">Patient</option>
            <option value="6">Family</option>
        </select>

        {{-- RESIDENT FIELDS --}}
        <div id="residentFields" style="display:none;">

            <label>Age</label>
            <input type="number" name="age">

            <label>Family Code</label>
            <input type="text" name="family_code">

            <label>Emergency Contact</label>
            <input type="text" name="emergency">

            <label>Relation to Emergency Contact</label>
            <input type="text" name="relation">
        </div>

        {{-- FAMILY FIELDS --}}
        <div id="familyFields" style="display:none;">
            <label>Family Code</label>
            <input type="text" name="family_code">

            <label>Patient ID</label>
            <input type="number" name="patient_id">
        </div>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>

        <div class="copyright" style="margin-top:20px; text-align:center;">
            © {{ date('Y') }} Old Folks Home Management System
        </div>

    </form>
</div>

<script>
document.getElementById("roleSelect").addEventListener("change", function() {
    let role = this.value;
    document.getElementById("residentFields").style.display = (role == "5") ? "block" : "none";
    document.getElementById("familyFields").style.display   = (role == "6") ? "block" : "none";
});
</script>

</body>
</html>
