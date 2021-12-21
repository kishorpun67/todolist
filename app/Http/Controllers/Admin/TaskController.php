<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todolist;
use Session;
class TaskController extends Controller
{
    public function viewTask()
    {

        $todolists = Todolist::get();
        Session::flash('page','task');
        return view('admin.task.view_task', compact('todolists'));


    }
    public function delete($id){
        $id = Todolist::find($id)->Delete();
        // $id = Todolist::where('id',$id)->forceDelete();
        return redirect()->back()->with('success_message', 'Tas has been deleted successfully');
    }
    //
}
