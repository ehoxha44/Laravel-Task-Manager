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
    public function index()
    {
        $tasks = $this->taskService->getTasksForUser(auth()->id());

        return view('tasks.index', compact('tasks'));
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
        $data = $request->validated();
        $this->taskService->createTask($data, auth()->id()); 

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Update a specific task in the database
    public function update(TaskRequest $request, $id)
    {
        $data = $request->validated();
        $this->taskService->updateTask($id, $data, auth()->id());
        
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id, auth()->id());
    
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    // Show a specific task
    public function show($id)
    {
        $task = $this->taskService->getTaskById($id, auth()->id()); 

        return view('tasks.show', compact('task'));
    }
}
