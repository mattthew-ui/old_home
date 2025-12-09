<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    {{-- @vite(['resources/css/app.css']) --}}
    <title>Admin Approval</title>
</head>
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
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>

  <div class="outer-wrap">
    <div class="paper">
      <h1>Accounts To Approve</h1>

      @if ($pendingUsers->isEmpty())
          <p>No pending user approvals.</p>
      @else
          @foreach ($pendingUsers as $User) 
            <div class = "userApp"> 
              <ul>
                <li>Name: {{ $User->fname }}</li>
                <li>Email: {{ $User->email }}</li>
                <li>ID: {{ $User->user_id }}</li>
                <li>Role: {{ $User->role_id }} </li>
              </ul>
            </div>
            <form method="POST" action="{{ route('userAppStatus') }}">
              @csrf
              <input type="hidden" name="user_id" value="{{ $User->user_id }}">
              <button type="submit" name="approve" value="approve">Approve</button>
              <button type="submit" name="reject" value="reject">Deny</button>
              </form>
          @endforeach
        @endif
      </div>
    </div>
</body>
</html>
