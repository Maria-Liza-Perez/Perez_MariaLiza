<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f9a8d4, #f472b6, #ec4899);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    /* Card Container */
    .login-card {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 1.2rem;
      width: 100%;
      max-width: 380px;
      box-shadow:
        0 6px 20px rgba(0, 0, 0, 0.5),
        0 0 18px rgba(236, 72, 153, 0.6);
      animation: glowPulse 3s infinite ease-in-out;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-align: center;
    }

    .login-card:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow:
        0 8px 28px rgba(0, 0, 0, 0.6),
        0 0 24px rgba(244, 114, 182, 0.8),
        0 0 36px rgba(236, 72, 153, 0.7);
    }

    @keyframes glowPulse {
      0%   { box-shadow: 0 6px 20px rgba(0,0,0,0.5), 0 0 12px rgba(236, 72, 153, 0.4); }
      50%  { box-shadow: 0 6px 20px rgba(0,0,0,0.5), 0 0 20px rgba(244, 114, 182, 0.6); }
      100% { box-shadow: 0 6px 20px rgba(0,0,0,0.5), 0 0 12px rgba(236, 72, 153, 0.4); }
    }

    /* Title */
    .login-title {
      font-size: 1.9rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
      color: #be185d;
      text-shadow: 0 1px 2px rgba(0,0,0,0.15);
    }

    /* Error message */
    .error-message {
      background: #ffe4e6;
      color: #be123c;
      padding: 0.6rem;
      border-radius: 0.6rem;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }

    /* Form */
    .login-form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .form-group {
      text-align: left;
    }

    .form-group label {
      font-size: 0.9rem;
      font-weight: 600;
      color: #9d174d;
      margin-bottom: 0.3rem;
      display: block;
    }

    .form-group input {
      width: 100%;
      padding: 0.6rem 0.75rem;
      border: 1px solid #f9a8d4;
      border-radius: 0.6rem;
      font-size: 1rem;
      outline: none;
      transition: border 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus {
      border-color: #ec4899;
      box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.25);
    }

    /* Password wrapper */
    .password-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .password-wrapper input {
      padding-right: 2.5rem;
      box-sizing: border-box;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      color: #9ca3af;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: #be185d;
    }

    /* Button */
    .btn-login {
      background: linear-gradient(135deg, #f472b6, #ec4899, #db2777);
      color: #fff;
      border: none;
      padding: 0.9rem;
      border-radius: 0.6rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
    }

    .btn-login:hover {
      transform: scale(1.04);
      box-shadow: 0 0 14px rgba(236, 72, 153, 0.7);
    }

    /* Register link */
    .register-text {
      margin-top: 1.2rem;
      font-size: 0.9rem;
      color: #6b7280;
    }

    .register-text a {
      color: #ec4899;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s;
    }

    .register-text a:hover {
      color: #be185d;
      text-decoration: underline;
    }
  </style>

</head>
<body>
  <div class="login-card">
    <h2 class="login-title">Login</h2>

```
<?php if (!empty($error)): ?>
  <div class="error-message">
    <?= $error ?>
  </div>
<?php endif; ?>

<form method="post" action="<?= site_url('auth/login') ?>" class="login-form">
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" placeholder="Enter your username" required>
  </div>

  <div class="form-group">
    <label>Password</label>
    <div class="password-wrapper">
      <input type="password" name="password" id="password" placeholder="Enter your password" required>
      <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
    </div>
  </div>

  <button type="submit" class="btn-login">Login</button>
</form>

<p class="register-text">
  Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
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
