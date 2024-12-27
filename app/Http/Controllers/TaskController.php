<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Constructor to enforce authentication
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    // Create a new task
    public function create(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->user_id = Auth::id();
        $task->save();

        return response()->json($task, 201); // HTTP 201 Created
    }

    // Get all tasks for the logged-in user
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return response()->json($tasks, 200); // HTTP 200 OK
    }

    // Update an existing task
    public function update(Request $request, $id)
    {
        // return 'okk';
        $task = Task::findOrFail($id);

        // Check if the logged-in user owns the task
        if ($task->user_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403); // HTTP 403 Forbidden
        }

        $task->update($request->all());
        return response()->json($task, 200); // HTTP 200 OK
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Check if the logged-in user owns the task
        if ($task->user_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403); // HTTP 403 Forbidden
        }

        $task->delete();
        return response()->json(['message' => 'Task deleted'], 200); // HTTP 200 OK
    }
}
