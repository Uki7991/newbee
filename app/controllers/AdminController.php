<?php


namespace app\controllers;


use app\models\Task;

class AdminController extends Controller
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

        $this->view->render('admin/index', [
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
}