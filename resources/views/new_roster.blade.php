<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Roster</title>
</head>
<body>
    <button type="button" onclick="window.location.href='/new-roster';">New Roster</button>
    <button type="button" onclick="window.location.href='/daily-roster';">Daily Roster</button>

    <h1>New Roster</h1>

    <form method="POST" action="/new-roster">
        @csrf

        <label for="date">Date</label><br>
        <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required><br><br>

        <label for="supervisor_id">Supervisor</label><br>
        <select id="supervisor_id" name="supervisor_id" required>
            <option value="" disabled selected>--</option>
            @foreach ($supervisors as $s)
                <option value="{{ $s->employee_id }}">
                    {{ $s->user->fname }} {{ $s->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="doctor_id">Doctor</label><br>
        <select id="doctor_id" name="doctor_id" required>
            <option value="" disabled selected>--</option>
            @foreach ($doctors as $d)
                <option value="{{ $d->employee_id }}">
                    {{ $d->user->fname }} {{ $d->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="caregiver_1_id">Caregiver 1</label><br>
        <select id="caregiver_1_id" name="caregiver_1_id">
            <option value="" disabled selected>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="caregiver_2_id">Caregiver 2</label><br>
        <select id="caregiver_2_id" name="caregiver_2_id">
            <option value="" disabled selected>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="caregiver_3_id">Caregiver 3</label><br>
        <select id="caregiver_3_id" name="caregiver_3_id">
            <option value="" disabled selected>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="caregiver_4_id">Caregiver 4</label><br>
        <select id="caregiver_4_id" name="caregiver_4_id">
            <option value="" disabled selected>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <input type="submit" value="OK">
        <button type="button" onclick="window.location.href='/daily-roster';">Cancel</button>
    </form>

</body>
</html>