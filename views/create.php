<?php

require '../functions/functions.php';

// cek apakah tombo; submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // cek info berhasil/gagal input data
  if (tambah($_POST) > 0) {
    echo "
       <script>
           alert('data berhasil ditambahkan!');
           document.location.href = 'index.php';
       </script>
       ";
  } else {
    echo "
       <script>
           alert('data gagal ditambahkan');
           document.location.href = 'index.php';
       </script>
   ";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Task</title>
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    #button {
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 5px;
    }
  </style>
</head>

<body>
  <div class="container p-5">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="card text-center">
          <div class="card-header">
            <h1 class="text-center">Add Task List</h1>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group mb-2">
                <label for="todo" class="m-2">Todo</label>
                <input name="description" type="text" placeholder="Enter your task..." autofocus autocomplete="off" id="description" class="form-control text-center" required />
              </div>
              <div class="form-group mb-2">
                <label for="deadline" class="m-2">Deadline</label>
                <input type="date" name="deadline" class="form-control text-center" required />
              </div>
              <div class="form-group d-block mb-2">
                <label for="priority" class="m-2">Priority</label>
                <select name="priority" id="priority" class="form-control text-center" required>
                  <option value="">Choose</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
              </div>
              <div class="form-group d-block">
                <button class="btn btn-secondary" name="submit" value="submit" type="submit">Add Task List</button>
              </div>
            </form>
            <a href="../views/index.php" id="button">Back <i style="margin-left: 5px" class="fas fa-arrow-left"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>