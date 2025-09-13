<!DOCTYPE html>
<html>
<head>
    <title>Create Cron Data</title>
</head>
<body>
    <h1>Create Cron Data</h1>

    <form action="{{ route('cron.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Create</button>
    </form>

    <a href="{{ route('cron.index') }}">Back to List</a>
</body>
</html>
