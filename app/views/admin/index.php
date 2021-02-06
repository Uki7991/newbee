<div class="container mx-auto pt-24">

    <button @click="sidebar=true" class="py-2 px-6 rounded-md bg-gray-700 text-white">
        Create
    </button>

    <div class="py-24">
        <?php if (count($tasks_collection['collection'])): ?>
            <table class="table-auto w-full">
                <thead>
                <tr class="bg-gray-400">
                    <td class="rounded-tl p-2">Id <a class="text-red-600" href="<?php echo \src\core\Route::to('/', ['page' => $tasks_collection['pagination']['page'], 'limit' => $tasks_collection['pagination']['limit'], 'orderBy' => 'id', 'orderDirection' => $tasks_collection['orderDirection'] === 'asc' ? 'desc' : 'asc']) ?>">order</a></td>
                    <td class="">Task <a class="text-red-600" href="<?php echo \src\core\Route::to('/', ['page' => $tasks_collection['pagination']['page'], 'limit' => $tasks_collection['pagination']['limit'], 'orderBy' => 'title', 'orderDirection' => $tasks_collection['orderDirection'] === 'asc' ? 'desc' : 'asc']) ?>">order</a></td>
                    <td class="">Username <a class="text-red-600" href="<?php echo \src\core\Route::to('/', ['page' => $tasks_collection['pagination']['page'], 'limit' => $tasks_collection['pagination']['limit'], 'orderBy' => 'username', 'orderDirection' => $tasks_collection['orderDirection'] === 'asc' ? 'desc' : 'asc']) ?>">order</a></td>
                    <td class="">Email <a class="text-red-600" href="<?php echo \src\core\Route::to('/', ['page' => $tasks_collection['pagination']['page'], 'limit' => $tasks_collection['pagination']['limit'], 'orderBy' => 'email', 'orderDirection' => $tasks_collection['orderDirection'] === 'asc' ? 'desc' : 'asc']) ?>">order</a></td>
                    <td class="rounded-tr p-2">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks_collection['collection'] as $task): ?>
                    <tr class="hover:bg-gray-100 transition-all group">
                        <td class="group-hover:rounded-l-xl p-2"><?php echo $task->id ?></td>
                        <td class=""><?php echo $task->title ?></td>
                        <td class=""><?php echo $task->username ?></td>
                        <td class=""><?php echo $task->email ?></td>
                        <td class="group-hover:rounded-r-xl p-2 flex space-x-3 items-center">
                            <a class="text-yellow-700" href="/admin/tasks/<?php echo $task->id ?>/edit">Edit</a>
                            <form action="/tasks/<?php echo $task->id; ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="bg-red-600 text-white rounded-md p-2">delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="flex mt-8">
                <?php for ($i = 1; $i <= $tasks_collection['pagination']['total_pages']; $i++): ?>
                    <a href="<?php echo \src\core\Route::to('/', ['page' => $i, 'limit' => 3, 'orderBy' => $tasks_collection['orderBy'], 'orderDirection' => $tasks_collection['orderDirection']]) ?>" class="px-3 py-2 mr-2 border border-gray-400 shadow-sm rounded"><?php echo $i; ?></a>
                <?php endfor; ?>
            </div>
        <?php else: ?>
            <p class="text-2xl font-bold text-center">There is no data!</p>
        <?php endif; ?>
    </div>
</div>
