<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
    $sql   = "SELECT * FROM users WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);
    $row   = mysqli_fetch_assoc($query);

    if (!$row) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Edit Data</h1>
        <form action="update.php" method="post" onsubmit="return konfirmasiEdit()">
            <h5>ID User: <?= htmlspecialchars($row['id']) ?></h5>
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
            <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>"
                placeholder="Masukkan nama anda..." required>
            <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>"
                placeholder="Masukkan email anda..." required>
            <input type="password" name="password" placeholder="Masukkan password baru..." required>
            <button type="submit">Simpan</button>
            <button type="reset">Reset</button>
        </form>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>
