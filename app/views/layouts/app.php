<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body x-data="{sidebar: <?php echo isset($errors) && (new \src\core\Request())->core == '/' ? 'true' : 'false' ?>}">
<header class="sticky top-0 w-full bg-white shadow-lg py-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-xl font-bold">NEWBEE</a>
        <?php if (\src\core\Auth::user()): ?>
            <div class="flex relative" x-data="{open: false}">
                <div @click="open=!open" class="cursor-pointer flex space-x-2 border rounded-lg items-center p-2">
                    <p><?php echo \src\core\Auth::user()->name; ?></p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="10" height="10" class="fill-current text-black"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z" class=""></path></svg>
                </div>
                <div x-show="open" @click.away="open=false" class="absolute right-0 top-full bg-gray-100 shadow-lg w-auto whitespace-nowrap rounded-md py-2 divide-y">
                    <?php if (\src\core\Auth::user()->admin): ?>
                        <div class="p-2 hover:bg-gray-200">
                            <a href="/admin" class="w-full block">Admin dashboard</a>
                        </div>
                    <?php endif; ?>
                    <form class="p-2 hover:bg-gray-200" action="/logout" method="post">
                        <button type="submit" class="focus:outline-none">Logout from system</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="flex space-x-4">
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            </div>
        <?php endif; ?>
    </div>
</header>
    <?php echo $content; ?>

    <div @click="sidebar=false" x-show="sidebar" class="absolute top-0 left-0 h-full w-full bg-black bg-opacity-70"></div>
    <div :class="{'translate-x-full': !sidebar, 'translate-x-0': sidebar}" class="fixed top-0 h-full w-1/3 -right-0 bg-white flex justify-center items-center shadow-xl transition-all duration-500 transform">
    <div @click="sidebar=false" class="absolute right-16 top-16 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="40" height="40" class="fill-current text-black"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
    </div>
    <form class="flex flex-col space-y-4 w-1/2" action="/tasks" method="post">
        <div class="flex flex-col">
            <label for="" class="mb-1">Title</label>
            <input class="rounded-md" type="text" name="title" value="<?php echo isset($old['title']) ? $old['title'] : ''; ?>">
            <?php if (isset($errors['title'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['title']?></span><?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="" class="mb-1">Username</label>
            <input class="rounded-md" type="text" name="username" value="<?php echo isset($old['username']) ? $old['username'] : ''; ?>">
            <?php if (isset($errors['username'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['username']?></span><?php endif; ?>
        </div>
        <div class="flex flex-col">
            <label for="" class="mb-1">E-mail</label>
            <input class="rounded-md" type="text" name="email" value="<?php echo isset($old['email']) ? $old['email'] : ''; ?>">
            <?php if (isset($errors['email'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['email']?></span><?php endif; ?>
        </div>
        <button type="submit" class="bg-gray-700 text-white py-2">Create</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</body>
</html>