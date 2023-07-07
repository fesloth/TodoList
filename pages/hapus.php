<?php
require '../functions/functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'schedule.php';
    </script>
    ";
} else {
    echo "
    <scrpit>
        alert('data gagal dihapus');
        document.location.href = 'schedule.php';
    </scrpit>
    ";
}
