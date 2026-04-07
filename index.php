<?php
include 'config/koneksi.php';

$sql = "SELECT * FROM users";

if (isset($_GET['search']) && $_GET['search'] !== "") {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['search']);
    $sql = "SELECT * FROM users WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%'";
}

$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- FORM TAMBAH DATA -->
    <div class="container">
        <h1>Tambah Data</h1>
        <form action="create.php" method="post" onsubmit="return konfirmasiKirim()">
            <input type="text" name="nama" placeholder="Masukkan nama anda..." required>
            <input type="email" name="email" placeholder="Masukkan email anda..." required>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Masukkan password anda..." required>
                <button type="button" class="show" id="togglePasswordButton" onclick="togglePassword()">show</button>
            </div>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </div>

    <!-- FORM CARI -->
    <form class="search-form" method="get" action="">
        <input type="search" name="search" placeholder="Cari data..."
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Cari</button>
    </form>

    <!-- TABEL DATA -->
    <div>
        <table>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                    echo "<td>
                            <a href='hapus.php?id=" . $row['id'] . "' onclick='return konfirmasiHapus()'>
                                <button type='button' class='hapus-btn'>Hapus</button>
                            </a>
                            <a href='edit.php?id=" . $row['id'] . "'>
                                <button type='button' class='edit-btn'>Edit</button>
                            </a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
            }
            mysqli_close($koneksi);
            ?>
        </table>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>