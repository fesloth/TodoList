<?php
require '../functions/functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // ambil data di URL
    $id = $_GET["id"];
    // query data berdasarkan id
    $jl = query("SELECT * FROM jadwal WHERE id = $id")[0];

    // cek info berhasil/gagal diubah data
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'schedule.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
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
                        <h1 class="text-center">Edit</h1>
                    </div>
                    <div class="card-body">
                        <?php
                        // ambil data di URL
                        $id = $_GET["id"];
                        // query data berdasarkan id
                        $jl = query("SELECT * FROM jadwal WHERE id = $id")[0];
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $jl["id"]; ?>">
                            <div class="form-group mb-2">
                                <label for="hari" class="m-2">Hari</label>
                                <select name="hari" id="hari" class="form-control text-center" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin" <?= ($jl["hari"] === "Senin") ? "selected" : ""; ?>>Senin</option>
                                    <option value="Selasa" <?= ($jl["hari"] === "Selasa") ? "selected" : ""; ?>>Selasa</option>
                                    <option value="Rabu" <?= ($jl["hari"] === "Rabu") ? "selected" : ""; ?>>Rabu</option>
                                    <option value="Kamis" <?= ($jl["hari"] === "Kamis") ? "selected" : ""; ?>>Kamis</option>
                                    <option value="Jumat" <?= ($jl["hari"] === "Jumat") ? "selected" : ""; ?>>Jumat</option>
                                </select>
                            </div>
                            <div class="form-group d-block mb-2">
                                <label for="subjek" class="m-2">Mata Pelajaran</label>
                                <input type="text" name="subjek" placeholder="masukkan mata pelajaran..." id="subjek" class="form-control text-center" value=" <?= $jl["subjek"]; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="ruangan" class="m-2">Ruangan</label>
                                <input type="text" name="ruangan" placeholder="ruangan..." class="form-control text-center" value=" <?= $jl["ruangan"]; ?>" required />
                            </div>
                            <div class="form-group mb-2">
                                <label for="status" class="m-2">Status</label>
                                <select name="status" id="status" class="form-control text-center" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Di Sekolah" <?= ($jl["status"] === "Di Sekolah") ? "selected" : ""; ?>>Di Sekolah</option>
                                    <option value="Daring" <?= ($jl["status"] === "Daring") ? "selected" : ""; ?>>Daring</option>
                                    <option value="Magang" <?= ($jl["status"] === "Magang") ? "selected" : ""; ?>>Magang</option>
                                </select>
                            </div>
                            <div class="form-group d-block">
                                <button class="btn btn-success" name="submit" value="submit" type="submit">Edit Data!</button>
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