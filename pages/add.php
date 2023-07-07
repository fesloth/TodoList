<?php

require '../functions/functions.php';

// cek apakah tombo; submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  // cek info berhasil/gagal input data
  if (add($_POST) > 0) {
    echo "
       <script>
           alert('data berhasil ditambahkan!');
           document.location.href = 'schedule.php';
       </script>
       ";
  } else {
    echo "
       <script>
           alert('data gagal ditambahkan');
           document.location.href = 'schedule.php';
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
  <title>Add Subject</title>
  <!-- bootstrap link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<style>
  #button {
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 5px;
  }
</style>

<body>
  <div class="container p-5">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="card text-center">
          <div class="card-header">
            <h1 class="text-center">Add Subject</h1>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group mb-2">
                <label for="hari" class="m-2">Hari</label>
                <select name="hari" id="hari" class="form-control text-center" required>
                  <option value="">Pilih Hari</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                </select>
              </div>
              <div class="form-group d-block mb-2">
                <label for="subjek" class="m-2">Mata Pelajaran</label>
                <input type="text" name="subjek" placeholder="masukkan mata pelajaran..." id="subjek" class="form-control text-center" required>
              </div>
              <div class="form-group mb-2">
                <label for="ruangan" class="m-2">Ruangan</label>
                <input type="text" name="ruangan" placeholder="ruangan..." class="form-control text-center" required />
              </div>
              <div class="form-group mb-2">
                <label for="status" class="m-2">Status</label>
                <select name="status" id="status" class="form-control text-center" required>
                  <option value="">Pilih Status</option>
                  <option value="Di Sekolah">Di Sekolah</option>
                  <option value="Daring">Daring</option>
                  <option value="Magang">Magang</option>
                </select>
              </div>
              <br>
              <div class="form-group d-block">
                <button class="btn btn-primary" name="submit" value="submit" type="submit">Add Subject</button>
              </div>
            </form>
            <a href="schedule.php" id="button">Back <i style="margin-left: 5px" class="fas fa-arrow-left"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>