<?php
namespace App\Repositories\Front;

 use App\Repositories\Front\TodoListRepositoryInterface;
 use App\Models\Todolist;
 use Session;

class TodoListRepository implements TodoListRepositoryInterface{
    public function viewTodoList(){
         $todolists = Todolist::where('user_id', auth()->user()->id)->get();
        Session::flash('page', 'task');
        return view('front.task.view_task', compact('todolists'));
    }

    public function addTask(array  $request)
    {
        if(empty($request['completed_at']))
        {
            $request['completed_at']  = "";
        }
        $newTask = new Todolist;
        $newTask->user_id =auth()->user()->id;
        $newTask->title = $request['title'];
        $newTask->description = $request['description'];
        $newTask->date = $request['date'];
        $newTask->status = $request['status'];
        $newTask->completed_at = $request['completed_at'];
        if ($newTask->save()) {
            return response()->json('success', 200);
        }
        return response()->json('fail', 200);

    }
    public function editTask(array  $request)
    {
        if(empty($request['completed_at']))
        {
            $request['completed_at']  = "";
        }
        $newTask =  Todolist::find($request['id']);
        $newTask->user_id =auth()->user()->id;
        $newTask->title = $request['title'];
        $newTask->description = $request['description'];
        $newTask->date = $request['date'];
        $newTask->status = $request['status'];
        $newTask->completed_at = $request['completed_at'];
        if ($newTask->save()) {
            return response()->json('success', 200);
        }
        return response()->json('fail', 200);

    }


    public function deleteTask($id)
    {
        Todolist::where('id', $id)->delete();
        return redirect()->back()->with('sccess_message', 'Task has been deleted successfully');
    }


}