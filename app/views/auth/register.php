<div class="flex justify-end bg-cover bg-no-repeat bg-wall">
    <div class="w-1/3 h-screen flex items-center bg-white bg-opacity-50 justify-center relative">
        <form class="flex flex-col space-y-4 w-1/2" action="/register" method="post">
            <div class="flex flex-col">
                <label for="" class="mb-1">Name</label>
                <input class="rounded-md" type="text" name="name" value="<?php echo isset($old['name']) ? $old['name'] : ''; ?>">
                <?php if (isset($errors['name'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['name']; ?></span><?php endif; ?>
            </div>
            <div class="flex flex-col">
                <label for="" class="mb-1">E-mail</label>
                <input class="rounded-md" type="email" name="email" value="<?php echo isset($old['email']) ? $old['email'] : ''; ?>">
                <?php if (isset($errors['email'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['email']; ?></span><?php endif; ?>
            </div>
            <div class="flex flex-col">
                <label for="" class="mb-1">Password</label>
                <input class="rounded-md" type="password" name="password">
                <?php if (isset($errors['password'])): ?><span class="text-xs mt-1 text-red-600"><?php echo $errors['password']; ?></span><?php endif; ?>
            </div>
            <div class="flex flex-col">
                <label for="" class="mb-1">Confirm password</label>
                <input class="rounded-md" type="password" name="password_confirmation">
            </div>
            <button type="submit" class="bg-gray-700 text-white py-2">Register</button>
            <a href="/login" class="text-xs text-center text-gray-900 underline hover:text-gray-700">Already have an account? Login</a>
        </form>

        <a href="/" class="absolute w-full left-0 bottom-0 bg-gray-900 py-8 text-center hover:bg-gray-700">
            <p class="text-xl font-bold text-white">NEWBEE</p>
        </a>
    </div>
</div>