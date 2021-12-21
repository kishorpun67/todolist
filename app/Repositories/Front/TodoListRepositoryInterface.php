<?php
namespace App\Repositories\Front;

interface TodoListRepositoryInterface{
    public function viewTodoList();

    public function addTask(array $request);

    public function editTask(array  $request);
    
    public function deleteTask($id);
}