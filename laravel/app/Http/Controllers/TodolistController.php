<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
     
    public function showAllData(){
        return view('fetchedData')->with('TodoArr',todolist::all());
    }


    public function delete($id){
        todolist::destroy(array('id',$id));
        return redirect('/');
    }

    public function create(){
        return view('createView');
    }

    public function todo_submit(Request $req){
        

        $todo = new todolist;
        $todo->name = $req->input('name');
        $todo->save();
        return redirect('/');
    }

    public function edit($id){
          
         return view('edit_todo')->with('TodoArr_name',todolist::find($id));
    }

    public function edit_submit(Request $req, $id){

       
         $todo = todolist::find($id);
         $todo->name = $req->input('name');
         $todo->save();
         return redirect('/');
    }

}




