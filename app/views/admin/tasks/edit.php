<div class="container mx-auto py-24">
    <form class="flex flex-col space-y-4 w-1/2" action="/admin/tasks/<?php echo $task->id; ?>/update" method="post">
        <div class="flex flex-col">
            <label for="" class="mb-1">Title</label>
            <input class="rounded-md" type="text" name="title" value="<?php echo $task->title; ?>">
            <?php if (isset($errors['title'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['title']?></span><?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="" class="mb-1">Username</label>
            <input class="rounded-md" type="text" name="username" value="<?php echo $task->username; ?>">
            <?php if (isset($errors['username'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['username']?></span><?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="" class="mb-1">E-mail</label>
            <input class="rounded-md" type="text" name="email" value="<?php echo $task->email; ?>">
            <?php if (isset($errors['email'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['email']?></span><?php endif; ?>
        </div>
        <button type="submit" class="bg-gray-700 text-white py-2">Create</button>
    </form>
</div>