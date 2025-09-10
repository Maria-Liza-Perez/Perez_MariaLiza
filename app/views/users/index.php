<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Index</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen p-8">

  <!-- Title -->
  <h1 class="text-4xl font-extrabold mb-10 text-center text-gray-800 drop-shadow-sm">
    Welcome to Index View
  </h1>

  <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-6">
    <div class="overflow-x-auto rounded-lg">
      <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
          <tr>
            <th class="py-3 px-6 text-left text-sm font-semibold">ID</th>
            <th class="py-3 px-6 text-left text-sm font-semibold">Username</th>
            <th class="py-3 px-6 text-left text-sm font-semibold">Email</th>
            <th class="py-3 px-6 text-center text-sm font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach (html_escape($users) as $user): ?>
          <tr class="hover:bg-blue-50 transition-colors duration-200">
            <td class="py-3 px-6 text-gray-700 font-medium"><?=$user['id'];?></td>
            <td class="py-3 px-6 text-gray-700"><?=$user['username'];?></td>
            <td class="py-3 px-6 text-gray-700"><?=$user['email'];?></td>
            <td class="py-3 px-6 text-center">
              <a href="<?=site_url('users/update/'.$user['id']); ?>" 
                 class="text-blue-600 hover:text-blue-800 font-medium transition">Update</a>
              <span class="mx-2 text-gray-400">|</span>
              <a href="<?=site_url('users/delete/'.$user['id']); ?>" 
                 class="text-red-600 hover:text-red-800 font-medium transition">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Create Record Button -->
    <div class="mt-6 text-center">
      <a href="<?=site_url('users/create'); ?>" 
         class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
         + Create Record
      </a>
    </div>
  </div>

</body>
</html>
