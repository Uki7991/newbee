<?php
namespace app\controllers;


use app\models\Task;
use app\validators\TaskStoreValidator;

class TaskController extends Controller
{
    public function index()
    {
        $taskModel = new Task();
        $tasks = $taskModel->all();

        $this->view->render('tasks/index', [
            'tasks' => $tasks,
        ]);
    }

    public function store()
    {
        $errors = (new TaskStoreValidator())->validate($this->request->request);
        if (!empty($errors)) {
            $this->response->back();
        }

        $task = new Task($this->request->request);
        $task->save();

        $this->response->redirect('/');
    }

    public function destroy($id)
    {
        $taskModel = new Task();
        $taskModel->deleteById($id);

        $this->response->redirect('/');
    }
}