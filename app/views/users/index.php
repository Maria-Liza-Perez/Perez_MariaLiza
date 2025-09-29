<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Management</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body {
    background: linear-gradient(135deg, #f9a8d4, #f472b6, #ec4899);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

.card {
background: rgba(255, 255, 255, 0.9);
border-radius: 1rem;
backdrop-filter: blur(12px);
box-shadow:
0 8px 30px rgba(0, 0, 0, 0.3),
0 0 25px rgba(236, 72, 153, 0.4);
transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
transform: translateY(-4px) scale(1.01);
box-shadow:
0 12px 36px rgba(0, 0, 0, 0.4),
0 0 30px rgba(219, 39, 119, 0.6);
}

.btn-primary {
background: linear-gradient(to right, #ec4899, #db2777);
color: #fff;
font-weight: 600;
padding: 0.55rem 1.25rem;
border-radius: 0.75rem;
transition: transform 0.2s ease, background 0.2s ease;
}
.btn-primary:hover {
background: linear-gradient(to right, #be185d, #9d174d);
transform: translateY(-2px) scale(1.05);
}

.btn-danger {
background: linear-gradient(to right, #f43f5e, #e11d48);
color: #fff;
font-weight: 600;
padding: 0.55rem 1.25rem;
border-radius: 0.75rem;
transition: transform 0.2s ease, background 0.2s ease;
}
.btn-danger:hover {
background: linear-gradient(to right, #be123c, #9f1239);
transform: translateY(-2px) scale(1.05);
}

.btn-edit {
background: #ec4899;
color: white;
padding: 0.35rem 1rem;
border-radius: 9999px;
font-size: 0.85rem;
font-weight: 500;
transition: all 0.2s;
}
.btn-edit:hover { background: #db2777; transform: scale(1.1); }

.btn-delete {
background: #f43f5e;
color: white;
padding: 0.35rem 1rem;
border-radius: 9999px;
font-size: 0.85rem;
font-weight: 500;
transition: all 0.2s;
}
.btn-delete:hover { background: #e11d48; transform: scale(1.1); }

table thead {
background: linear-gradient(to right, #ec4899, #db2777);
}
table thead th {
color: #ffffff;
font-weight: 700;
text-transform: uppercase;
font-size: 0.75rem;
letter-spacing: 0.05em;
}
table tbody tr {
transition: background 0.2s ease;
}
table tbody tr:hover { background: rgba(236, 72, 153, 0.12); }

.tag-admin {
background: #ffe4e6;
color: #be123c;
font-weight: 600;
}
.tag-user {
background: #f0fdf4;
color: #166534;
font-weight: 600;
}

.welcome-box {
display: inline-block;
background: linear-gradient(to right, #ec4899, #db2777);
color: white;
font-weight: 600;
padding: 0.6rem 1.4rem;
border-radius: 0.85rem;
box-shadow: 0 4px 16px rgba(236, 72, 153, 0.5);
font-size: 1rem;
transition: transform 0.2s ease;
}
.welcome-box:hover { transform: scale(1.08); }

.pagination a {
min-width: 2.5rem;
text-align: center;
font-weight: 600;
} </style>

</head>
<body class="flex justify-center p-4 min-h-screen">

<div class="container card mx-auto p-6 md:p-10 w-full">

  <!-- Dashboard Header -->

  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <h2 class="text-3xl font-bold text-gray-900 tracking-wide">
      <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
    </h2>
    <a href="<?=site_url('auth/logout'); ?>" class="btn-danger w-full md:w-auto text-center">Logout</a>
  </div>

  <!-- Welcome -->

  <?php if(!empty($logged_in_user)): ?>

```
<div class="mb-6">
  <span class="welcome-box">
    👋 Welcome, <?= html_escape($logged_in_user['username']); ?>!
  </span>
</div>
```

  <?php else: ?>

```
<p class="mb-6 text-red-600 font-semibold">⚠️ Logged in user not found</p>
```

  <?php endif; ?>

  <!-- Search + Add -->

  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 gap-4 flex-wrap">
    <form action="<?=site_url('users');?>" method="get" class="flex flex-col sm:flex-row items-start sm:items-center gap-3 w-full sm:w-auto">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input type="text" name="q" placeholder="🔍 Search users..." value="<?=html_escape($q);?>"
             class="w-full sm:w-72 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-500 focus:outline-none">
      <button type="submit" class="btn-primary flex items-center justify-center space-x-2 w-full sm:w-auto">
        <span>Search</span>
      </button>
    </form>

```
<a href="<?=site_url('users/create'); ?>" class="btn-primary flex items-center justify-center shadow-md hover:scale-105 w-full sm:w-auto">
  ➕ Add Account
</a>
```

  </div>

  <!-- Table -->

  <div class="bg-white/95 rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead class="border-b border-gray-200">
          <tr>
            <th class="py-3 px-4 text-left">Username</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Role</th>
            <th class="py-3 px-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="4" class="py-12 text-center text-gray-500">
                <p class="text-lg font-semibold">No user records found.</p>
                <p class="mt-2 text-sm">Click the <strong>Add Account</strong> button to add one!</p>
              </td>
            </tr>
          <?php else: ?>
            <?php foreach (html_escape($users) as $user): ?>
              <tr class="hover:bg-pink-50/60">
                <td class="py-4 px-4 text-sm text-gray-900 font-medium whitespace-nowrap"><?=$user['username'];?></td>
                <td class="py-4 px-4 text-sm text-gray-600 whitespace-nowrap"><?=$user['email'];?></td>
                <td class="py-4 px-4 text-sm whitespace-nowrap">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs <?= $user['role'] === 'admin' ? 'tag-admin' : 'tag-user'; ?>">
                    <?= ucfirst(html_escape($user['role'])); ?>
                  </span>
                </td>
                <td class="py-4 px-4 text-sm font-medium text-center whitespace-nowrap">
                  <div class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3">
                    <a href="<?=site_url('users/update/'.$user['id']); ?>" class="btn-edit w-full sm:w-auto text-center">✏️ Edit</a>
                    <a href="<?=site_url('users/delete/'.$user['id']); ?>" 
                       class="btn-delete w-full sm:w-auto text-center"
                       onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">🗑️ Delete</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

```
  <!-- Pagination -->
  <div class="flex flex-wrap justify-cen
```
