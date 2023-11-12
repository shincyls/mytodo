<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;

class TodoItemController extends Controller
{   
    // List All Todo Items
    public function all()
    {
        $todoItems = TodoItem::all();
        return view('todo.index', compact('todoItems'));
    }

    // Create a new TODO item
    public function create(Request $request)
    {
        $todoItem = new TodoItem();
        $todoItem->title = $request->input('title');
        $todoItem->description = $request->input('description');
        $todoItem->due_date = $request->input('due_date');
        $todoItem->save();
        return redirect()->route('todo.index');
    }

    // Update the TODO item
    public function update(Request $request, $id)
    {
        $todoItem = TodoItem::find($id);
        $todoItem->title = $request->input('title');
        $todoItem->description = $request->input('description');
        $todoItem->due_date = $request->input('due_date');
        $todoItem->save();
        return redirect()->route('todo.index');
    }

    // Complete the TODO item
    public function complete(Request $request, $id)
    {
        $todoItem = TodoItem::find($id);
        $todoItem->is_completed = true;
        $todoItem->save();
        return redirect()->route('todo.index');
    }

    // Delete a TODO item
    public function delete($id)
    {
        $todoItem = TodoItem::find($id);
        $todoItem->delete();
        return redirect()->route('todo.index');
    }

}