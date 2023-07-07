<?php

require '../functions/functions.php';

$tugas = query("SELECT * FROM tugas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['status'])) {
    $status = "";
    if ($_POST['status'] == 1) {
      $status = "On Progress";
    } elseif ($_POST['status'] == 2) {
      $status = "Done";
    }

    if ($status != "") {
      $id = $_POST['id'];
      $query = "UPDATE tugas SET status='$status' WHERE id=$id";
      mysqli_query($conn, $query);
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Todo-List</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<style>
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
            <a class="nav-link active" href="">Todo-List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/schedule.php">Jadwal Pelajaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/timer.html">Stopwatch & Timer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: salmon;" href="#"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i> Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <!-- content -->
  <div class="container p-3 mb-5 text-center" style="width: 100%; height: max-content; min-height: 100vh;">
    <div class="card mt-4">
      <div class="card-body">
        <section>
          <h1 class="card-title text-center">TODO-LIST</h1>
          <hr>
          <br>
          <a href="create.php" class="add mt-2">Add Task List</a>
          <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
              <tr>
                <th>No.</th>
                <th>Priority</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($tugas as $row) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["priority"]; ?></td>
                  <td><?= $row["description"]; ?></td>
                  <td><?= $row["deadline"]; ?></td>
                  <td><?= $row["status"]; ?></td>
                  <td>
                    <form action="index.php" method="post" style="display: inline-block;">
                      <input type="hidden" name="status" value="1">
                      <input type="hidden" name="id" value="<?= $row['id']; ?>">
                      <button type="submit" class="icon-button" title="Start">
                        <i class="fas fa-hourglass-start"></i>
                      </button>
                    </form> |
                    <form action="index.php" method="post" style="display: inline-block;">
                      <input type="hidden" name="status" value="2">
                      <input type="hidden" name="id" value="<?= $row['id']; ?>">
                      <button type="submit" class="icon-button" title="Done">
                        <i style="color: green;" class="fas fa-check"></i>
                      </button>
                    </form>
                    |
                    <a href="edit.php?id=<?= $row["id"]; ?>"><i class="bi bi-pencil-square"></i></a> |
                    <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"><i style="color: red;" class="bi bi-trash3-fill"></i></a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </section>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
    <div class="content" style="padding: 20px 10px">
      <div class="top">
        <div class="media-icons">
          <a target="_blank" href="https://github.com/fesloth"><i class="fab fa-github"></i></a>
          <a target="_blank" href="https://twitter.com/nielvoff"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="https://instagram.com/fesloth"><i class="fab fa-instagram"></i></a>
          <a target="_blank" href="https://www.linkedin.com/in/syahla-nur-azizah-3a8ab4270/"><i class="fab fa-linkedin-in"></i></a>
          <a target="_blank" href="https://gitlab.com/fesloth"><i class="fab fa-gitlab"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>