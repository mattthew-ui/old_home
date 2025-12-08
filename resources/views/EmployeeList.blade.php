<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>

<h1>Employee List</h1>

<form method="GET" action="{{ route('EmployeeList') }}">
    @csrf

    <label for="filter">Search By:</label>
    <select name="filter">
        <option value="">-- Select Filter --</option>
        <option value="employee_id" {{ request('filter') == 'employee_id' ? 'selected' : '' }}>Employee ID</option>
        <option value="role_id" {{ request('filter') == 'role_id' ? 'selected' : '' }}>Role ID</option>
        <option value="salary" {{ request('filter') == 'salary' ? 'selected' : '' }}>Salary</option>
    </select>

    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">

    <button type="submit">Search</button>
</form>

<br>

<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Role ID</th>
        <th>Salary</th>
    </tr>

    @foreach ($employees as $emp)
        <tr>
            <td>{{ $emp->employee_id }}</td>
            <td>{{ $emp->fname }} {{ $emp->lname }}</td>
            <td>{{ $emp->role_id }}</td>
            <td>{{ $emp->salary }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>