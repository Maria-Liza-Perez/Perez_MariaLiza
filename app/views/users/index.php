<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
  <nav class="bg-blue-600 shadow-md p-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="text-white fw-bold fs-4">Student Management</h1>
      <a href="<?=site_url('users/create'); ?>" 
         class="bg-white text-blue-600 fw-semibold px-4 py-2 rounded-lg shadow-sm hover:bg-gray-100 transition">
         + Create Record
      </a>
    </div>
  </nav>

  <div class="container mt-5">

    <!-- Search Bar -->
    <form action="<?=site_url('users');?>" method="get" class="d-flex justify-content-end mb-4">
      <?php
      $q = '';
      if(isset($_GET['q'])) {
        $q = $_GET['q'];
      }
      ?>
      <input class="form-control me-2 w-50" name="q" type="text" placeholder="Search student..." value="<?=html_escape($q);?>">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Card for Table -->
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-body">
        <h2 class="card-title mb-4 fw-bold text-center text-gray-700">Students List</h2>
        
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach(html_escape($users) as $user): ?>
              <tr>
                <td class="fw-semibold"><?=$user['id'];?></td>
                <td><?=$user['username'];?></td>
                <td><?=$user['email'];?></td>
                <td class="text-center">
                  <a href="<?=site_url('users/update/'.$user['id']); ?>" 
                     class="text-blue-600 hover:text-blue-800 fw-semibold me-3">Update</a>
                  <a href="<?=site_url('users/delete/'.$user['id']); ?>" 
                     class="text-red-600 hover:text-red-800 fw-semibold">Delete</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
          <?php echo $page; ?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
