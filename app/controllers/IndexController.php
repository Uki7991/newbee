<?php
namespace app\controllers;


use app\models\Task;
use app\models\User;

class IndexController extends Controller
{
    public function index()
    {
        $taskModel = new Task();
        $limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : 3;
        $page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
        $orderBy = isset($this->request->query['orderBy']) ? $this->request->query['orderBy'] : 'id';
        $orderDirection = isset($this->request->query['orderDirection']) ? $this->request->query['orderDirection'] : 'asc';
        $offset = ($page - 1) * $limit;

        $totalResults = $taskModel->count();
        $totalPages = ceil($totalResults / $limit);

        $tasks = $taskModel->all($limit, $offset, $orderBy, $orderDirection);

        $this->view->render('index', [
            'tasks_collection' => [
                'collection' => $tasks,
                'pagination' => [
                    'total_pages' => $totalPages,
                    'page' => $page,
                    'limit' => $limit,
                ],
                'orderBy' => $orderBy,
                'orderDirection' => $orderDirection,
            ],
        ]);
    }

    public function show($id)
    {
        $user = new User();
        debug($user->findById($id));
    }

    public function names($name)
    {
        $user = new User();
        debug($user->findByEmail($name));
    }
}