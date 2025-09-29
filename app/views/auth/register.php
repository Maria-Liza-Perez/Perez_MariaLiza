
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #ec4899, #8b5cf6);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    /* Card Container */
    .register-card {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 1rem;
      width: 100%;
      max-width: 420px;
      box-shadow:
        0 6px 20px rgba(0, 0, 0, 0.6),
        0 0 12px rgba(236, 72, 153, 0.6);
      animation: borderGlow 3s infinite ease-in-out;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-align: center;
    }

    .register-card:hover {
      transform: translateY(-4px) scale(1.01);
      box-shadow:
        0 8px 25px rgba(0, 0, 0, 0.7),
        0 0 20px rgba(236, 72, 153, 0.8),
        0 0 30px rgba(139, 92, 246, 0.6);
    }

    @keyframes borderGlow {
      0%   { box-shadow: 0 6px 20px rgba(0,0,0,0.6), 0 0 10px rgba(236,72,153,0.5); }
      50%  { box-shadow: 0 6px 20px rgba(0,0,0,0.6), 0 0 20px rgba(139,92,246,0.7); }
      100% { box-shadow: 0 6px 20px rgba(0,0,0,0.6), 0 0 10px rgba(236,72,153,0.5); }
    }

    /* Title */
    .register-title {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
      color: #1f2937;
    }

    /* Error message */
    .error-message {
      background: #fee2e2;
      color: #b91c1c;
      padding: 0.6rem;
      border-radius: 0.5rem;
      font-size: 0.9rem;
      margin-bottom: 1rem;
      text-align: left;
    }

    /* Form */
    .register-form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .form-group {
      text-align: left;
      position: relative;
    }

    .form-group label {
      font-size: 0.9rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.3rem;
      display: block;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 0.6rem 0.75rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 1rem;
      outline: none;
      transition: border 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
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
      color: #6b7280;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: #111827;
    }

    /* Button */
    .btn-register {
      background: #ec4899;
      color: #fff;
      border: none;
      padding: 0.8rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
    }

    .btn-register:hover {
      background: #db2777;
      transform: scale(1.03);
      box-shadow: 0 0 12px rgba(236, 72, 153, 0.6);
    }

    /* Login link */
    .login-text {
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #374151;
    }

    .login-text a {
      color: #ec4899;
      font-weight: 600;
      text-decoration: none;
    }

    .login-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h2 class="register-title">Register</h2>

    <?php if(isset($error)): ?>
      <div class="error-message">
        <?= html_escape($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/register'); ?>" class="register-form">
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
        <div class="password-wrapper">
          <input type="password" id="password" name="password" placeholder="Create a password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      </div>

      <div class="form-group">
        <label>Role</label>
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn-register">Register</button>
    </form>

    <p class="login-text">
      Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a>
    </p>
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

