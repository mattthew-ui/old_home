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
        <label for="roster_date">Date</label><br>
        <input type="date" id="roster_date" name="roster_date" value="<?php echo date('Y-m-d');?>" required><br><br>

        <label for="roster_supervisor">Supervisor</label><br>
        <select id="roster_supervisor" name="roster_supervisor" required>
            <option value="" selected disabled>--</option>
            @foreach ($supervisors as $s)
                <option value="{{ $s->employee_id }}">
                    {{ $s->user->fname }} {{ $s->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="roster_doctor">Doctor</label><br>
        <select id="roster_doctor" name="roster_doctor" required>
            <option value="" selected disabled>--</option>
            @foreach ($doctors as $d)
                <option value="{{ $d->employee_id }}">
                    {{ $d->user->fname }} {{ $d->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="roster_caregiver_1">Caregiver 1</label><br>
        <select id="roster_caregiver_1" name="roster_caregiver_1">
            <option value="" selected disabled>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="roster_caregiver_2">Caregiver 2</label><br>
        <select id="roster_caregiver_2" name="roster_caregiver_2">
            <option value="" selected disabled>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="roster_caregiver_3">Caregiver 3</label><br>
        <select id="roster_caregiver_3" name="roster_caregiver_3">
            <option value="" selected disabled>--</option>
            @foreach ($caregivers as $cg)
                <option value="{{ $cg->employee_id }}">
                    {{ $cg->user->fname }} {{ $cg->user->lname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="roster_caregiver_4">Caregiver 4</label><br>
        <select id="roster_caregiver_4" name="roster_caregiver_4">
            <option value="" selected disabled>--</option>
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