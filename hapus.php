<?php
include 'config/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id  = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = "DELETE FROM users WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
            window.location.href = 'index.php';
          </script>";
}

mysqli_close($koneksi);
?>
