<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

<div class="paper">

    <div class="logo-wrap">
        <img class="logo-area" src="https://cdn.discordapp.com/attachments/1436340554010202163/1441101630060892191/d98a94ac-ea43-401a-94ed-0654418bd71f-removebg-preview.png?ex=6938f5ba&is=6937a43a&hm=7b8c0648168f91714c93e674c0e5c765e5f5a811b3066cedae4c5e2531ba1148">
    </div>

    <h2 style="text-align:center;">Login</h2>

    {{-- SESSION MESSAGE --}}
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

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <p style="margin-top:20px;">
            Need an account?
            <a href="{{ route('register') }}">Register Here</a>
        </p>

        <div class="copyright" style="margin-top:20px; text-align:center;">
            © {{ date('Y') }} Old Folks Home Management System
        </div>

    </form>

</div>

</body>
</html>