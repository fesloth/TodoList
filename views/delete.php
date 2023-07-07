<?php
require '../functions/functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <scrpit>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
    </scrpit>
    ";
}
