<?php
include 'config/koneksi.php';

$id       = mysqli_real_escape_string($koneksi, $_POST['id']);
$nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$sql = "UPDATE users SET nama='$nama', email='$email', password='$password' WHERE id='$id'";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal memperbarui data!');
            window.location.href = 'index.php';
          </script>";
}

mysqli_close($koneksi);
?>
