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
    <div class="row">
        <div class="col-12 text-end mb-3">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
    <h3 class="text-center mb-4">All Tasks</h3>

    <form action="{{ route('tasks.index') }}" method="GET" class="row g-3 mb-3">
        <div class="col-md-4">
            <label for="priority" class="form-label">Filter by Priority</label>
            <select name="priority" id="priority" class="form-select">
                <option value="">All</option>
                <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">Filter by Status</label>
            <select name="status" id="status" class="form-select">
                <option value="">All</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Completed</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary">Apply Filters</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Creation Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->priority == 1) High
                        @elseif($task->priority == 2) Medium
                        @elseif($task) Low
                        @endif
                    </td>
                    <td>{{ $task->created_at->format('F d, Y H:i') }}</td>
                    <td>{{ $task->status ? 'Completed' : 'Pending' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
