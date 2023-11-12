<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;

class TodoItemApiController extends Controller
{
    // List All Todo Items
    public function all()
    {
        $todoItems = TodoItem::all();
        return response()->json(['data' => $todoItems,'error' => false], 200);
    }

    // Get a specific TODO item
    public function show($id)
    {
        $todoItem = TodoItem::find($id);
        if (!$todoItem) {
            return response()->json(['message' => 'Todo item not found','error' => true], 404);
        }
        return response()->json(['data' => $todoItem,'error' => false], 200);
    }

    // Create a new TODO item
    public function add(Request $request)
    {
        $todoItem = TodoItem::create($request->all());
        return response()->json(['data' => $todoItem,'error' => false], 201);
    }

    // Update a TODO item
    public function update(Request $request, $id)
    {
        $todoItem = TodoItem::find($id);
        if (!$todoItem) {
            return response()->json(['message' => 'Todo item not found','error' => true], 404);
        } else {
            $todoItem->update($request->all());
            return response()->json(['data' => $todoItem,'error' => false], 200);
        }
    }

    // Complete a TODO item
    public function complete(Request $request, $id)
    {
        $todoItem = TodoItem::find($id);
        if (!$todoItem) {
            return response()->json(['message' => 'Todo item not found','error' => true], 404);
        } else {
            $todoItem->is_completed = true;
            $todoItem->save();
            return response()->json(['data' => $todoItem,'error' => false], 200);
        }
    }

    // Delete a TODO item
    public function delete($id)
    {
        $todoItem = TodoItem::find($id);
        if (!$todoItem) {
            return response()->json(['message' => 'Todo item not found','error' => true], 404);
        } else {
            $todoItem->delete();
            return response()->json(['message' => 'Todo item deleted','error' => false], 200);
        }
    }
}
