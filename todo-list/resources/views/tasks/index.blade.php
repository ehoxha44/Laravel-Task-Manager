<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center mb-4">All Tasks</h3>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Creation Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>title</td>
                <td>description</td>
                <td>date</td>
                <td>status</td>
                <td>
                    <a href="{{ route('tasks.show') }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('tasks.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
