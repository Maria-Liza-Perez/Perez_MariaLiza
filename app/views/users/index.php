
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Management - Dashboard</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ffafcc, #ffc8dd, #ffb3d9);
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    h2 {
      color: #d63384;
      margin: 0 0 10px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .header a {
      text-decoration: none;
      background: #ff69b4;
      color: #fff;
      padding: 8px 15px;
      border-radius: 8px;
      font-size: 14px;
      transition: background 0.3s ease;
    }

    .header a:hover {
      background: #e75480;
    }

    .welcome {
      background: #ffe6f2;
      padding: 12px 20px;
      border-left: 5px solid #d63384;
      border-radius: 6px;
      margin-bottom: 20px;
      font-weight: 500;
      color: #b83272;
    }

    .actions {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .actions form {
      display: flex;
      gap: 8px;
    }

    .actions input[type="text"] {
      padding: 8px 12px;
      border: 1px solid #f7a1c4;
      border-radius: 6px;
      outline: none;
    }

    .actions button {
      background: #ff69b4;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .actions button:hover {
      background: #e75480;
    }

    .actions a {
      background: #d63384;
      color: white;
      padding: 8px 15px;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .actions a:hover {
      background: #b83272;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table th, table td {
      border: 1px solid #f7a1c4;
      padding: 12px;
      text-align: left;
    }

    table th {
      background: #ffe6f2;
      color: #d63384;
    }

    table tbody tr:nth-child(even) {
      background: #fff0f6;
    }

    table a {
      text-decoration: none;
      margin-right: 10px;
      color: #d63384;
      font-weight: 500;
    }

    table a:hover {
      text-decoration: underline;
    }

    .pagination {
  display: flex;
  justify-content: center;
  margin-top: 25px;
}

.pagination ul {
  display: flex;
  gap: 8px;
  list-style: none;
  padding: 0;
  margin: 0;
  flex-wrap: wrap;
}

.pagination li {
  display: inline-block;
}

.pagination a, 
.pagination span {
  display: inline-block;
  padding: 8px 14px;
  border: 1px solid #f7a1c4;
  border-radius: 8px;
  text-decoration: none;
  color: #d63384;
  background: #fff;
  transition: all 0.3s ease;
  font-weight: 500;
}

.pagination a:hover {
  background: #ff69b4;
  color: #fff;
}

.pagination .active {
  background: #d63384;
  color: #fff;
  border-color: #d63384;
  font-weight: bold;
}



  </style>
</head>
<body>
  <div class="container">

    <!-- Dashboard Header -->
    <div class="header">
      <h2>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>
      <a href="<?=site_url('auth/logout'); ?>">Logout</a>
    </div>

    <!-- Highlighted Welcome -->
    <?php if(!empty($logged_in_user)): ?>
      <div class="welcome">
        Welcome: <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <p>Logged in user not found</p>
    <?php endif; ?>

    <!-- Search + Add -->
    <div class="actions">
      <form action="<?=site_url('users');?>" method="get">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input type="text" name="q" placeholder="Search users..." value="<?=html_escape($q);?>">
        <button type="submit">Search</button>
      </form>

      <a href="<?=site_url('users/create'); ?>">+ Add Account</a>
    </div>

    <!-- Table -->
    <div>
      <table>
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
            <tr>
              <td colspan="4">
                <p>No user records found.</p>
                <p>Click the "Add Account" button to add one!</p>
              </td>
            </tr>
          <?php else: ?>
            <?php foreach (html_escape($users) as $user): ?>
              <tr>
                <td><?=$user['username'];?></td>
                <td><?=$user['email'];?></td>
                <td><?= ucfirst(html_escape($user['role'])); ?></td>
                <td>
                  <a href="<?=site_url('users/update/'.$user['id']); ?>">Edit</a>
                  <a href="<?=site_url('users/delete/'.$user['id']); ?>" 
                     onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                     Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>

     <!-- Pagination -->
<div class="pagination">
  <?= $page; ?>
</div>


    </div>
  </div>
</body>
</html>

