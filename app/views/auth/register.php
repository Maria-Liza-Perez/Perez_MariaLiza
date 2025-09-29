<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Font Awesome for eye icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #fbcfe8, #f472b6, #db2777);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      animation: gradientShift 12s ease infinite;
      background-size: 300% 300%;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .form-container {
      background: rgba(255, 255, 255, 0.97);
      padding: 2.2rem;
      border-radius: 1.4rem;
      box-shadow:
        0 8px 28px rgba(0, 0, 0, 0.4),
        0 0 25px rgba(236, 72, 153, 0.6),
        inset 0 0 15px rgba(244, 114, 182, 0.25);
      width: 100%;
      max-width: 430px;
      text-align: center;
      animation: fadeIn 1.2s ease-in-out;
      backdrop-filter: blur(8px);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      margin-bottom: 1.4rem;
      color: #be185d;
      font-size: 2rem;
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 0 2px 4px rgba(0,0,0,0.15);
    }

    .error {
      background-color: #ffe4e6;
      border: 1px solid #f9a8d4;
      color: #be123c;
      padding: 10px;
      margin-bottom: 1rem;
      border-radius: 6px;
      font-size: 0.9rem;
      text-align: left;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .form-group {
      text-align: left;
      position: relative;
    }

    label {
      font-weight: 600;
      font-size: 0.9rem;
      color: #9d174d;
      display: block;
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 11px 40px 11px 12px;
      border: 1px solid #f9a8d4;
      border-radius: 0.8rem;
      font-size: 1rem;
      box-sizing: border-box;
      transition: all 0.3s ease;
      background: #fffafc;
    }

    input:focus,
    select:focus {
      border-color: #ec4899;
      box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.2);
      outline: none;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 68%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #a1a1aa;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: #db2777;
    }

    button {
      background: linear-gradient(135deg, #f472b6, #ec4899, #be185d);
      color: white;
      border: none;
      padding: 0.95rem;
      border-radius: 0.8rem;
      cursor: pointer;
      font-size: 1.05rem;
      font-weight: bold;
      letter-spacing: 0.5px;
      transition: all 0.25s ease;
    }

    button:hover {
      transform: scale(1.06) translateY(-2px);
      box-shadow: 0 8px 20px rgba(236, 72, 153, 0.55);
    }

    p {
      margin-top: 1.4rem;
      font-size: 0.9rem;
      color: #6b7280;
    }

    a {
      color: #ec4899;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
    }

    a:hover {
      color: #be185d;
      text-decoration: underline;
    }
  </style>

</head>
<body>
  <div class="form-container">
    <h2>Register</h2>

```
<?php if(isset($error)): ?>
  <div class="error">
    <?= html_escape($error); ?>
  </div>
<?php endif; ?>

<form method="POST" action="<?= site_url('auth/register'); ?>">
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" placeholder="Choose a username" required>
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" id="password" name="password" placeholder="Create a password" required>
    <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
  </div>

  <div class="form-group">
    <label>Role</label>
    <select name="role" required>
      <option value="user" selected>User</option>
      <option value="admin">Admin</option>
    </select>
  </div>

  <button type="submit">Register</button>
</form>

<p>
  Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a>
</p>
```

  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
