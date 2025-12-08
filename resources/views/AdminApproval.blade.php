<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    {{-- @vite(['resources/css/app.css']) --}}
    <title>Admin Approval</title>
</head>
<body>

    @if ($pendingUsers->isEmpty())
        <p class="no-pending">No pending user approvals.</p>
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
</body>
</html>
