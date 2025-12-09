<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Role</title>
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
        table{
            width: 100%;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="paper">
        <h1>Create New Role</h1>

        <form method="POST" action="{{ route('storeRoleCreation') }}">
        @csrf
        <label> Role Name </label>
        <input type="text" name="role_name" required>
        <br>
        <label> Access Level</label>
        <input type="number" name="access_level" required>

        <button type="submit"> Create New Role</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</body>
</html>