<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('storeRoleCreation') }}">
        @csrf
        <label> Role Name </label>
        <input type="text" name="role_name" required>
        <br>
        <label> Access Level</label>
        <input type="integer" name="access_level" required>

        <button type="submit"> Create New Role</button>
    </form>
</body>
</html>