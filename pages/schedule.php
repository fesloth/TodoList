<?php

require '../functions/functions.php';

$jadwal = query("SELECT * FROM jadwal");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jadwal Pelajaran</title>
  <!-- link css -->
  <link rel="stylesheet" href="../views/style.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
  body {
    font-family: "Poppins", sans-serif;
  }

  .add {
    display: block;
    padding: 10px 20px;
    background-color: #999999;
    color: #ffffff;
    text-decoration: none;
    border-radius: 4px;
    margin-bottom: 10px;
    float: left;
  }

  .add:hover {
    background-color: #777777;
  }

  .icon-button {
    border: none;
    background-color: transparent;
    cursor: pointer;
    font-size: 1rem;
    color: grey;
  }

  .icon-button:focus {
    outline: none;
  }
</style>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg p-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Jangan lupa nugas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../views/index.php">Todo-List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Jadwal Pelajaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="timer.html">Stopwatch & Timer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: salmon" href="#"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i> Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <!-- table -->
  <div class="container p-3 mb-5 text-center">
    <div class="card mt-4">
      <div class="card-body">
        <section>
          <h1 class="card-title text-center">Jadwal Pelajaran</h1>
          <hr>
          <br>
          <a href="add.php" class="add mt-2">Add Subjects</a>
          <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
              <tr>
                <th>No.</th>
                <th>Hari</th>
                <th>Mata Pelajaran</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($jadwal as $row) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["hari"]; ?></td>
                  <td><?= $row["subjek"]; ?></td>
                  <td><?= $row["ruangan"]; ?></td>
                  <td><?= $row["status"]; ?></td>
                  <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>"><i class="bi bi-pencil-square"></i></a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"><i style="color: red;" class="bi bi-trash3-fill"></i></a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
            <!-- table end -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>