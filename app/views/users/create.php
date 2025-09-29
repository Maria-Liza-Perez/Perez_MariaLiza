<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #fbcfe8, #f9a8d4, #f472b6);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 1rem;
      box-shadow: 
        0 4px 15px rgba(0, 0, 0, 0.4),
        0 0 8px rgba(236, 72, 153, 0.4);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      animation: borderGlow 3s infinite ease-in-out;
    }

    .card:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow: 
        0 6px 20px rgba(0, 0, 0, 0.5),
        0 0 15px rgba(236, 72, 153, 0.7),
        0 0 25px rgba(244, 114, 182, 0.6);
    }

    @keyframes borderGlow {
      0%   { box-shadow: 0 4px 15px rgba(0,0,0,0.4), 0 0 8px rgba(236,72,153,0.3); }
      50%  { box-shadow: 0 4px 15px rgba(0,0,0,0.4), 0 0 18px rgba(244,114,182,0.6); }
      100% { box-shadow: 0 4px 15px rgba(0,0,0,0.4), 0 0 8px rgba(236,72,153,0.3); }
    }

    .form-label {
      font-weight: 600;
      color: #be185d;
      margin-bottom: 0.4rem;
      display: inline-block;
    }

    input, select {
      transition: all 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #ec4899 !important;
      box-shadow: 0 0 10px rgba(236, 72, 153, 0.6);
    }

    .btn {
      transition: all 0.3s ease;
      border-radius: 0.5rem;
      font-weight: 600;
      position: relative;
      overflow: hidden;
    }

    .btn::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.4), transparent 70%);
      transform: scale(0);
      transition: transform 0.5s ease;
    }

    .btn:hover::before {
      transform: scale(1);
    }

    .btn:hover {
      transform: scale(1.05);
      box-shadow: 0 0 12px rgba(236, 72, 153, 0.6);
    }

    .icon-toggle {
      top: 50%;
      transform: translateY(-50%);
      right: 0.75rem;
      color: #6b7280;
      transition: color 0.3s ease;
    }

    .icon-toggle:hover {
      color: #ec4899;
      text-shadow: 0 0 6px rgba(236, 72, 153, 0.7);
    }

    @media (max-width: 480px) {
      .card {
        padding: 1.5rem !important;
      }
      h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">

  <div class="card w-full max-w-md p-8">
    <h2 class="text-3xl font-bold mb-6 text-pink-700 text-center">Create User</h2>

    <?php if(isset($error)): ?>
      <div class="bg-pink-100 border border-pink-400 text-pink-700 px-4 py-3 rounded mb-4 text-sm">
        <?= html_escape($error); ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('users/create'); ?>">
      <!-- Username -->
      <div class="mb-5">
        <label for="username" class="form-label">Username</label>
        <input 
          type="text" id="username" name="username" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none"
          placeholder="Enter username"
        />
      </div>

      <!-- Email -->
      <div class="mb-5">
        <label for="email" class="form-label">Email</label>
        <input 
          type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none"
          placeholder="Enter email"
        />
      </div>

      <!-- Password -->
      <div class="mb-5">
        <label for="password" class="form-label">Password</label>
        <div class="relative">
          <input 
            type="password" id="password" name="password" required
            class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-md focus:outline-none"
            placeholder="Enter password"
          />
          <i class="fa-solid fa-eye icon-toggle absolute cursor-pointer" id="togglePassword"></i>
        </div>
      </div>

      <!-- Role -->
      <div class="mb-6">
        <label for="role" class="form-label">Role</label>
        <select 
          name="role" id="role" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none"
        >
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex gap-4">
        <button type="submit" class="btn flex-1 bg-pink-600 text-white py-2 hover:bg-pink-700">
          Create User
        </button>
        <a href="<?= site_url('users'); ?>" class="btn flex-1 bg-gray-500 text-white py-2 text-center hover:bg-gray-600">
          Cancel
        </a>
      </div>
    </form>
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
