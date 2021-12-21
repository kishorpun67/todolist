<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Front\TodoListRepository;

class TodoListController extends Controller
{
    private $todoListRepository;
    public function __construct(TodoListRepository $todoListRepository)
    {
        $this->todoListRepository = $todoListRepository;
    }
    
    public function viewTodoList()
    {
        return $this->todoListRepository->viewTodoList();
    }
    public function addTask()
    {
        // return response(request()->all());
        return $this->todoListRepository->addTask(request()->all());
    }
    public function editTask()
    {
        // return response(request()->all());
        return $this->todoListRepository->addTask(request()->all());
    }
    public function deleteTask($id)
    {
        return $this->todoListRepository->deleteTask($id);

    }
    
}
