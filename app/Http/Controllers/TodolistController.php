<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Database\Seeders\TodolistSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todolistData = Todolist::all();

        return view('todo_list.index', ['todolistData' => $todolistData]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('todo_list.create_form');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        todolist::create($validated);

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo_item = Todolist::find($id);
        return view('todolist.show_item', compact('todo_item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo_item = Todolist::find($id);
        return view('todo_list.edit', ['todo_item' => $todo_item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $item_todo = Todolist::find($id);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $item_todo->update($validated);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $todo_item = Todolist::find($id);
        $todo_item->delete();

        return Redirect::back();
    }

    public function view_description($id)
    {
        $todo_item = Todolist::find($id);

        return view('todo_list.view_description', ['todo_item' => $todo_item]);

    }

    public function done(string $id)
    {

        $todo_item = Todolist::find($id);
        if($todo_item->status == 1){
            $todo_item->status = 0;
        }
        else {
            $todo_item->status = 1;
        }

        $todo_item->save();


        return redirect('/tasks');

    }
}
