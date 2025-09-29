
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f9c5d1, #f08ca0);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 30px;
      width: 100%;
      max-width: 450px;
    }
    h2 {
      text-align: center;
      color: #d63384;
      font-size: 26px;
      margin-bottom: 20px;
    }
    .form-label {
      font-weight: 600;
      color: #444;
      margin-bottom: 6px;
      display: inline-block;
    }
    input, select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
    }
    input:focus, select:focus {
      border-color: #e75480;
      outline: none;
      box-shadow: 0 0 6px rgba(231, 84, 128, 0.5);
    }
    .btn {
      display: inline-block;
      text-align: center;
      padding: 10px 16px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
    }
    .btn-primary {
      background: #e75480;
      color: #fff;
    }
    .btn-primary:hover {
      background: #d63384;
    }
    .btn-secondary {
      background: #aaa;
      color: #fff;
    }
    .btn-secondary:hover {
      background: #888;
    }
    .error-box {
      background: #ffe3ec;
      border: 1px solid #f08ca0;
      color: #b91c1c;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      font-size: 14px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .btn-group {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Update User</h2>

    <?php if(isset($error)): ?>
      <div class="error-box">
        <?= html_escape($error); ?>
      </div>
    <?php endif; ?>

    <form action="<?=site_url('users/update/'.segment(4));?>" method="POST">
      <!-- Username -->
      <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <input 
          type="text" id="username" name="username"
          value="<?= html_escape($user['username']);?>" required
          placeholder="Enter username"
        />
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input 
          type="email" id="email" name="email"
          value="<?= html_escape($user['email']);?>" required
          placeholder="Enter email"
        />
      </div>

      <!-- Role -->
      <div class="form-group">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" required>
          <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
          <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="btn-group">
        <button type="submit" class="btn btn-primary flex-1">Update User</button>
        <a href="<?= site_url('users'); ?>" class="btn btn-secondary flex-1">Cancel</a>
      </div>
    </form>
  </div>

</body>
</html>

