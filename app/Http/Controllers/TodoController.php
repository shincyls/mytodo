<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'nullable|date',
        ]);
        $todo = Todo::create($validatedData);
        return response()->json(['data' => $todo], 201);
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo '.$id.' not found',
                'status' => 'error'
            ], 404);
        } else {
            return response()->json($todo);
        }
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo '.$id.' not found',
                'status' => 'error'
            ], 404);
        } else {
            $todo->update($request->all());
            return response()->json($todo);
        }
    }

    public function complete(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo '.$id.' not found',
                'status' => 'error'
            ], 404);
        } else {
            $todo->is_completed = true;
            $todo->save();
            return response()->json([
                'message' => 'Todo '.$id.' completed',
                'status' => 'ok'
            ], 200);
        }
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json([
                'message' => 'Todo '.$id.' not found',
                'status' => 'error'
            ], 404);
        } else {
            $todo->delete();
            return response()->json([
                'message' => 'Todo '.$id.' deleted',
                'status' => 'ok'
            ], 200);
        }
    }
}
