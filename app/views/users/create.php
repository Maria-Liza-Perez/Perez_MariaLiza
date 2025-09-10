<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
    <form action="<?=site_url('users/create');?>" method="POST" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Create User</h2>

        <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
        <input 
            type="text" 
            id="username" 
            name="username" 
            required 
            class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter username"
        />

        <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
        <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            class="w-full px-4 py-2 mb-6 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Enter email"
        />

        <button 
            type="submit" 
            class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition-colors duration-300"
        >
            Save
        </button>
    </form>
</body>
</html>