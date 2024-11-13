<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    // Display the create task form
    public function create()
    {
        return view('tasks.create');
    }

    // Display a list of all tasks
    public function index(Request $request)
    {
        $query = $this->taskService->getTasksForUser(auth()->id());

        // Apply priority filter if it's set
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Apply status filter if it's set
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tasks = $query->get();

        $noTasksFound = $tasks->isEmpty();

        return view('tasks.index', compact('tasks', 'noTasksFound'));
    }
    

    // Display the edit form for a specific task
    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id, auth()->id()); 

        return view('tasks.edit', compact('task'));
    }

    // Store a new task
    public function store(TaskRequest $request)
    {
        try {
            $data = $request->validated();
            $this->taskService->createTask($data, auth()->id());

            return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->withErrors('Something went wrong, please try again.');
        }
    }

    // Update a specific task in the database
    public function update(TaskRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $this->taskService->updateTask($id, $data, auth()->id());

            return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->withErrors('Failed to update the task, please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $this->taskService->deleteTask($id, auth()->id());

            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->withErrors('Failed to delete the task, please try again.');
        }
    }

    // Show a specific task
    public function show($id)
    {
        $task = $this->taskService->getTaskById($id, auth()->id()); 

        return view('tasks.show', compact('task'));
    }
}
