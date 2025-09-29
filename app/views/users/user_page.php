<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Page</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Card with subtle pink glow */
.glow-card {
    background: #ffffff;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: pulseGlow 4s infinite;
}

.glow-card:hover {
transform: translateY(-5px) scale(1.02);
}

@keyframes pulseGlow {
0%, 100% {
box-shadow:
0 6px 20px rgba(0, 0, 0, 0.15),
0 0 6px rgba(236, 72, 153, 0.25),
0 0 12px rgba(244, 114, 182, 0.25);
}
50% {
box-shadow:
0 6px 20px rgba(0, 0, 0, 0.15),
0 0 10px rgba(236, 72, 153, 0.35),
0 0 20px rgba(244, 114, 182, 0.35);
}
} </style>

</head>
<body class="bg-gradient-to-br from-pink-100 via-pink-200 to-pink-300 min-h-screen">
<div class="container mx-auto px-4 py-8">

```
<!-- Header -->
<div class="glow-card mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-3xl font-bold text-pink-700">Welcome to User Page</h1>
        <p class="text-pink-600 mt-2">Hello, <?= html_escape($logged_in_user['username']); ?>!</p>
    </div>
    <div class="flex space-x-4">
        <a href="<?= site_url('auth/logout'); ?>" 
           class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 w-full md:w-auto text-center shadow-md">
            Logout
        </a>
    </div>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="glow-card">
        <div class="flex items-center mb-4">
            <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-md">
                <?= strtoupper(substr($logged_in_user['username'], 0, 1)); ?>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-pink-700">Profile Information</h3>
                <p class="text-pink-500">Your account details</p>
            </div>
        </div>
        <div class="space-y-2 text-sm md:text-base">
            <div class="flex justify-between">
                <span class="text-pink-600">Username:</span>
                <span class="font-medium text-gray-800"><?= html_escape($logged_in_user['username']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-pink-600">Email:</span>
                <span class="font-medium text-gray-800"><?= html_escape($logged_in_user['email']); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-pink-600">Role:</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-700">
                    <?= ucfirst(html_escape($logged_in_user['role'])); ?>
                </span>
            </div>
        </div>
    </div>

    <!-- System Info Card -->
    <div class="glow-card">
        <h3 class="text-lg font-semibold text-pink-700 mb-4">System Information</h3>
        <div class="space-y-2 text-sm md:text-base text-pink-600">
            <p>Welcome to your user dashboard!</p>
            <p>Here you can view your account details and role information.</p>
            <p>Your role determines the features and access available to you.</p>
            <p>If you encounter any issues or need assistance, please contact your administrator.</p>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="mt-8 text-center text-pink-500 text-sm">
    <p>&copy; <?= date('Y'); ?> User Management System. All rights reserved.</p>
</div>
```

</div>
</body>
</html>
