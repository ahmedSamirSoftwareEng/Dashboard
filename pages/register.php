<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form action="" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
            <!-- Error -->
            <?php if (!empty($errors['name'])): ?>
                <p class="text-red-500 text-xs italic mt-2"><?php echo htmlspecialchars($errors['name']); ?></p>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            <!-- Error -->
            <?php if (!empty($errors['email'])): ?>
                <p class="text-red-500 text-xs italic mt-2"><?php echo htmlspecialchars($errors['email']); ?></p>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
            <!-- Error -->
            <?php if (!empty($errors['password'])): ?>
                <p class="text-red-500 text-xs italic mt-2"><?php echo htmlspecialchars($errors['password']); ?></p>
            <?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="confirmpassword" class="block text-gray-700 font-bold mb-2">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm your password">
            <!-- Error -->
            <?php if (!empty($errors['confirmpassword'])): ?>
                <p class="text-red-500 text-xs italic mt-2"><?php echo htmlspecialchars($errors['confirmpassword']); ?></p>
            <?php endif; ?>
        </div>

        <!-- Profile Picture -->
        <div class="mb-4">
            <label for="profilepicture" class="block text-gray-700 font-bold mb-2">Profile Picture:</label>
                <input type="file" id="profilepicture" name="profilepicture">
            
        </div>
        <!-- Buttons -->
        <div class="flex items-center justify-between">
            <input type="submit" name="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            <input type="reset" name="reset" value="Reset" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
</body>
</html>