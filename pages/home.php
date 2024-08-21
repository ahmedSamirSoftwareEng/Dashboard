<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-6">
    <div class="container mx-auto bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Users</h1>
            <a href="../register.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Add User</a>
        </div>
        <table class="min-w-full text-left">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="py-2 px-4 border-b">Profile Picture</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row -->
               <?php foreach ($users as $user): ?>
                <tr>
                    <td class="py-2 px-4 border-b">
                        <img src="../uploads/<?php echo $user['imagename']; ?>" alt="Profile Picture" class="w-20 h-20 rounded-full">
                    </td>
                    <td class="py-2 px-4 border-b">
                        <?php echo $user['name']; ?>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <?php echo $user['email']; ?>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <form action="../update.php" method="post">
                        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                            <input type="submit" name="edit" value="Edit" class="text-blue-500 hover:text-blue-700">
                        </form>
                        <form action="../handlers/delete_user.php" method="post">
                            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
                            <input type="submit" name="delete" value="Delete" class="text-red-500 hover:text-red-700">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <!-- Repeat for other users -->
            </tbody>
        </table>
    </div>
</body>
</html>
