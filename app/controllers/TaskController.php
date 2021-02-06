<?php
namespace app\controllers;


use app\models\Task;
use app\validators\TaskStoreValidator;
use app\validators\TaskUpdateValidator;

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

    public function edit($id)
    {
        $task = (new Task())->findById($id);

        $this->view->render('admin/tasks/edit', [
            'task' => $task,
        ]);
    }

    public function update($id)
    {
        $errors = (new TaskUpdateValidator())->validate($this->request->request);
        if (!empty($errors)) {
            $this->response->back();
        }

        $task = (new Task())->findById($id);

        $task->update($this->request->request);

        $this->response->redirect('/admin');
    }

    public function destroy($id)
    {
        $taskModel = new Task();
        $taskModel->deleteById($id);

        $this->response->redirect('/');
    }
}