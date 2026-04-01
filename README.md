# LUX Cinema Ticket Reservation System

![Project Logo](img/logo.jpg)

**LUX Cinema** adalah aplikasi berbasis web yang dirancang untuk memudahkan pengguna dalam memesan tiket bioskop secara online. Dengan antarmuka yang modern dan responsif, pengguna dapat melihat jadwal film yang sedang tayang, menonton trailer, dan melakukan reservasi kursi dengan cepat. Proyek ini juga dilengkapi dengan panel admin yang kuat untuk mengelola daftar film dan data pemesanan.

---

## 🚀 Fitur Utama

### 👤 Panel Pengguna
- **Eksplorasi Film**: Menampilkan daftar film yang sedang tayang langsung dari database.
- **Cuplikan Trailer**: Integrasi dengan YouTube untuk menonton trailer film favorit.
- **Profil Aktor**: Halaman khusus untuk mengenal lebih dekat aktor-aktor ternama dengan cuplikan video profil.
- **Sistem Reservasi**: Form pemesanan tiket yang mencakup pemilihan teater, tipe kursi, tanggal, dan waktu tayang.
- **Informasi Detail**: Informasi lengkap mengenai sutradara, aktor, durasi, dan genre setiap film.
- **Hubungi Kami**: Form feedback bagi pengguna untuk mengirimkan pesan atau pertanyaan kepada admin.

### 🔐 Panel Admin
- **Dashboard Statistik**: Pantau jumlah total pemesanan, jumlah film, dan pesan masuk.
- **Manajemen Film**: Tambahkan film baru lengkap dengan poster, durasi, dan detail lainnya melalui form yang mudah digunakan.
- **Manajemen Reservasi**: Lihat daftar semua booking yang masuk dan hapus data reservasi jika diperlukan.
- **Sistem Login Keamanan**: Akses terbatas hanya untuk administrator yang terdaftar.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP (Native)
- **Database**: MySQL (MariaDB)
- **Frontend**: HTML5, CSS3, JavaScript (jQuery)
- **Ikon & Font**: FontAwesome, Google Fonts
- **Framework UI (Admin)**: Bootstrap 5 (pada halaman login)

---

## 📥 Panduan Instalasi (Lokal menggunakan XAMPP)

1. **Clone Repositori**
   Simpan project ini di folder `htdocs` Anda (biasanya di `C:\xampp\htdocs\`).

2. **Persiapan Database**
   - Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
   - Buat database baru dengan nama `cinema_db`.
   - Import file `database/cinema_db.sql` ke dalam database tersebut.

3. **Konfigurasi Koneksi**
   - Pastikan pengaturan host, user, dan password di file `database/config.php` sudah sesuai dengan environment lokal Anda.
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $dbname = "cinema_db";
   ```

4. **Jalankan Aplikasi**
   Akses website melalui browser di alamat: `http://localhost/Cinema-Reservation/`.

---

## 🔑 Informasi Akses Admin

Gunakan kredensial berikut untuk masuk ke dashboard admin:
- **URL Admin**: `http://localhost/Cinema-Reservation/admin/`
- **Username**: `admin`
- **Password**: `admin`

---

## 📸 Struktur Folder

```text
Cinema-Reservation/
├── admin/          # Dashboard manajemen admin
├── database/       # Skrip SQL dan konfigurasi database
├── img/            # Aset gambar dan poster film
├── includes/       # Komponen PHP reusable (header/footer)
├── scripts/        # File JavaScript & jQuery
├── style/          # File stylesheet (CSS)
├── booking.php     # Halaman pemesanan tiket
└── index.php       # Halaman utama aplikasi
```

---

## 📝 Catatan
Proyek ini dikembangkan menggunakan PHP 8.1. Pastikan versi PHP Anda kompatibel untuk performa terbaik.

**Author**: Yohana
