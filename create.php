<?php
include 'config/koneksi.php';

$nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Data berhasil disimpan!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menyimpan data!');
            window.location.href = 'index.php';
          </script>";
}

mysqli_close($koneksi);
?>
