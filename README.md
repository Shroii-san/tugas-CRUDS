# Aplikasi CRUD PHP - Manajemen Data User

Aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola data user (Create, Read, Update, Delete).

---

## 📁 Struktur Folder

```
project/
├── config/
│   └── koneksi.php       # Konfigurasi koneksi database
├── assets/
│   ├── css/
│   │   └── style.css     # Tampilan / styling halaman
│   └── js/
│       └── script.js     # Fungsi JavaScript (konfirmasi, show password)
├── index.php             # Halaman utama: form tambah & tabel data
├── create.php            # Proses tambah data baru
├── edit.php              # Halaman form edit data
├── update.php            # Proses update data
├── hapus.php             # Proses hapus data
└── README.md
```

---

## ⚙️ Prasyarat

- PHP >= 7.4
- MySQL / MariaDB
- Web server (Apache / Nginx) atau XAMPP / Laragon

---

## 🗄️ Setup Database

1. Buat database baru di MySQL:

```sql
CREATE DATABASE tugasCRUD;
```

2. Buat tabel `users`:

```sql
USE tugasCRUD;

CREATE TABLE users (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nama     VARCHAR(100)  NOT NULL,
    email    VARCHAR(150)  NOT NULL,
    password VARCHAR(255)  NOT NULL
);
```

---

## 🚀 Cara Menjalankan

1. Clone atau salin folder `project/` ke direktori web server:
   - XAMPP: `C:/xampp/htdocs/project/`
   - Laragon: `C:/laragon/www/project/`

2. Sesuaikan konfigurasi database di `config/koneksi.php`:

```php
$host     = "localhost";
$user     = "root";
$pass     = "";          // sesuaikan password MySQL
$database = "tugasCRUD";
```

3. Jalankan web server, lalu buka browser:

```
http://localhost/project/
```

---

## 🔧 Fitur

| Fitur         | File             | Keterangan                             |
|---------------|------------------|----------------------------------------|
| Lihat data    | `index.php`      | Menampilkan semua data user dalam tabel |
| Tambah data   | `create.php`     | Menyimpan data user baru ke database   |
| Cari data     | `index.php`      | Pencarian berdasarkan nama atau email  |
| Edit data     | `edit.php`       | Menampilkan form edit data user        |
| Update data   | `update.php`     | Menyimpan perubahan data ke database   |
| Hapus data    | `hapus.php`      | Menghapus data user dari database      |

---

## ⚠️ Catatan

- Aplikasi ini dibuat untuk keperluan **belajar** dan belum menggunakan fitur keamanan tingkat produksi.
- Password saat ini disimpan dalam bentuk **plain text**. Untuk keamanan lebih, gunakan `password_hash()` saat menyimpan dan `password_verify()` saat memvalidasi.
- Query menggunakan `mysqli_real_escape_string()` sebagai perlindungan dasar dari SQL Injection. Untuk keamanan yang lebih baik, gunakan **Prepared Statements**.
