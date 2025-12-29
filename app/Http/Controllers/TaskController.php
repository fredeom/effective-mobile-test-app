<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        $task = Task::find($id);

        if ($task) {
            return TaskResource::collection([$task]);
        } else if ($id) {
            return response()->json([
                'error' => 'Task not found',
            ], 404);
        }
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): TaskResource
    {
        $validated = $request->validated();

        $task = Task::create($validated);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $validated = $request->validated();
        $task = Task::find($id);
        if ($task) {
            $task->update($validated);
            return new TaskResource($task);
        }
        return response()->json([
            'error' => 'Task not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();

            return response()->json([
                'message' => 'Task deleted successfully',
                'id' => $task->id,
            ], 200);
        }
        return response()->json([
            'error' => 'Task not found',
        ], 404);
    }
}
