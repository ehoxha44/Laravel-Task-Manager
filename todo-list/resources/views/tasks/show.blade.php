<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center mb-4">View Task</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text">
                <strong>Priority:</strong> 
                @if($task->priority == 1) High
                @elseif($task->priority == 2) Medium
                @else Low
                @endif
            </p>

            <p class="card-text">
                <strong>Created At:</strong> {{ $task->created_at->format('F d, Y H:i') }}
            </p>
            <p class="card-text">
                <strong>Status:</strong> {{ $task->status ? 'Completed' : 'Pending' }}
            </p>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
