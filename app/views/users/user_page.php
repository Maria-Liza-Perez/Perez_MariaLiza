
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard</title>
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ffafcc, #ffc8dd, #ffb3d9);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
      overflow: hidden;
      animation: fadeIn 0.7s ease-in-out;
    }

    .card-header {
      background: #ff69b4;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .card-header h1 {
      margin: 0;
      font-size: 24px;
    }

    .card-header p {
      margin: 8px 0 12px;
      font-size: 16px;
    }

    .card-header a {
      background: #fff;
      color: #d63384;
      padding: 8px 15px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: background 0.3s ease, color 0.3s ease;
    }

    .card-header a:hover {
      background: #ffe6f2;
      color: #b83272;
    }

    .card-body {
      padding: 20px;
    }

    .card-body h2 {
      margin-top: 0;
      color: #d63384;
    }

    .card-body ul {
      list-style: none;
      padding: 0;
      margin: 0 0 20px;
    }

    .card-body ul li {
      margin-bottom: 10px;
      padding: 10px;
      background: #fff0f6;
      border-left: 5px solid #d63384;
      border-radius: 6px;
      font-size: 15px;
    }

    .card-body p {
      font-size: 14px;
      line-height: 1.5;
      color: #555;
    }

    .card-footer {
      background: #ffe6f2;
      text-align: center;
      padding: 12px;
      font-size: 13px;
      color: #b83272;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<div class="card">

    <!-- Header -->
    <div class="card-header">
        <h1>User Dashboard</h1>
        <p>Welcome, <?= html_escape($logged_in_user['username']); ?>!</p>
        <a href="<?= site_url('auth/logout'); ?>">Logout</a>
    </div>

    <!-- Single Section -->
    <div class="card-body">
        <h2>Account Information</h2>
        <ul>
            <li><strong>Username:</strong> <?= html_escape($logged_in_user['username']); ?></li>
            <li><strong>Email:</strong> <?= html_escape($logged_in_user['email']); ?></li>
            <li><strong>Role:</strong> <?= ucfirst(html_escape($logged_in_user['role'])); ?></li>
        </ul>

        <p>
          Welcome to your dashboard. Your role determines the features and access available to you.  
          If you encounter issues or need help, please contact your administrator.
        </p>
    </div>

    <!-- Footer -->
    <div class="card-footer">
        <p>&copy; <?= date('Y'); ?> User Management System</p>
    </div>

</div>

</body>
</html>