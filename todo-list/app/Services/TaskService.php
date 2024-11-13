<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    public function getTasksForUser($userId)
    {
        return Task::where('user_id', $userId)->get();
    }

    public function getTaskById($id, $userId)
    {
        return Task::where('user_id', $userId)->findOrFail($id);
    }

    public function createTask(array $data, $userId)
    {
        $data['user_id'] = $userId;
        return Task::create($data);
    }

    public function updateTask($id, array $data, $userId)
    {
        $task = Task::where('user_id', $userId)->findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id, $userId)
    {
        $task = Task::where('user_id', $userId)->findOrFail($id);
        return $task->delete();
    }
}