<?php

namespace App\Http\Controllers;

use App\Eloquent\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $task = Task::query()
            ->create([
                'user_id' => $request->input('user_id'),
                'description' => $request->input('description'),
                'order' => $request->input('order'),
                'completed' => false,
            ]);

        $data = [
            'success' => !!$task,
            'task' => $task,
        ];

        return response()->json($data);
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'tasks' => 'required|array',
        ]);

        $tasks = $request->input('tasks');

        $success = true;
        foreach ($tasks as $task) {
            $done = Task::query()->find($task['id'])
                ->update([
                    'order' => $task['order'],
                ]);

            if (! $done) {
                $success = false;
            }
        }

        return response()->json($success);
    }

    public function updateState(Request $request)
    {
        $request->validate([
            'task_id' => 'required|integer',
            'state' => 'required|boolean',
        ]);

        $success = !!Task::query()->find($request->input('task_id'))
            ->update([
                'completed' => $request->input('state'),
            ]);

        return response()->json($success);
    }
}
