<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex items-center space-x-4">
            <!-- Profile Picture -->
            <div class="relative w-24 h-24">
                <img src="../uploads/<?php echo $user['imagename']; ?>" alt="User Picture" class="w-full h-full object-cover rounded-full border-2 border-gray-300" id="profile-picture">

            </div>
            <!-- User Info -->
            <div>
                <?php 
                    if (!empty($user)) {
                        echo '<h1 class="text-xl font-semibold">' . $user['name'] . '</h1>';
                        echo '<p class="text-gray-600">' . $user['email'] . '</p>';
                    }
                ?>
            </div>
        </div>
        <div class="mt-6">
            <!-- Update Form -->
            <form action="../handlers/handle_update.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-blue-500" value="<?php echo $user['name']; ?>">
                    <!-- input hidden for email -->
                    <input type="hidden" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                  <!-- upload profile picture -->
                  <div class="mb-4 mt-4 w-full border-2 border-gray-300 p-2 rounded-lg">
                    <input type="file" id="profile-picture" value="<?php echo $user['imagename']; ?>" name="profile-picture" class="w-full border-2 border-gray-300 p-2 rounded-lg focus:outline-none focus:border-blue-500">
                     </div>
               <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                  
            </form>
                 
        </div>
    </div>
</body>
</html>
