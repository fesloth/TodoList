<?php
require '../functions/functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // ambil data di URL
    $id = $_GET["id"];
    // query data berdasarkan id
    $tgs = query("SELECT * FROM tugas WHERE id = $id")[0];

    // cek info berhasil/gagal diubah data
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
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
    <title>Edit Task</title>
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
                        <h1 class="text-center">Edit Task List</h1>
                    </div>
                    <div class="card-body">
                        <?php
                        // ambil data di URL
                        $id = $_GET["id"];
                        // query data berdasarkan id
                        $tgs = query("SELECT * FROM tugas WHERE id = $id")[0];
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $tgs["id"]; ?>">
                            <div class="form-group mb-2">
                                <label for="todo" class="m-2">Todo</label>
                                <input name="description" type="text" id="description" class="form-control text-center" value=" <?= $tgs["description"]; ?>" />
                            </div>
                            <div class="form-group mb-2">
                                <label for="deadline" class="m-2">Deadline</label>
                                <input type="date" name="deadline" class="form-control text-center" value="<?= $tgs["deadline"]; ?>" />
                            </div>
                            <div class="form-group d-block mb-2">
                                <label for="priority" class="m-2">Priority</label>
                                <select name="priority" id="priority" class="form-control text-center">
                                    <option value="High" <?= ($tgs["priority"] === "High") ? "selected" : ""; ?>>High</option>
                                    <option value="Medium" <?= ($tgs["priority"] === "Medium") ? "selected" : ""; ?>>Medium</option>
                                    <option value="Low" <?= ($tgs["priority"] === "Low") ? "selected" : ""; ?>>Low</option>
                                </select>
                            </div>

                            <div class="form-group d-block">
                                <button class="btn btn-secondary" name="submit" value="submit" type="submit">Edit Task List</button>
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