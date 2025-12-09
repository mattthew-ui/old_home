<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
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
<body>
    <div class="paper">
        <h1>Employee List</h1>

        <form method="GET" action="{{ route('EmployeeList') }}">
            @csrf

            <label for="filter">Search By:</label>
            <select name="filter">
                <option value="">-- Select Filter --</option>
                <option value="employee_id" {{ request('filter') == 'employee_id' ? 'selected' : '' }} style="width: 20%;">Employee ID</option>
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
    </div>

</body>
</html>