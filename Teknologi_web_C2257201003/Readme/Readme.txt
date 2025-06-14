📋 Sistem Pemesanan Menu Cafe Berbasis Web

📝 Deskripsi Proyek

Sistem ini merupakan aplikasi berbasis web untuk memudahkan pelanggan memesan menu di sebuah kafe secara online. Aplikasi menyediakan fitur katalog menu, detail produk, sistem pemesanan sementara, dan manajemen data pengguna. Proyek ini dibangun menggunakan PHP dengan struktur modular yang terdiri dari beberapa file utama seperti index.php, login.php, dan menu-caffe.php dll.
⚙️ Teknologi yang Digunakan

Bahasa Pemrograman: PHP
Database: MySQL (melalui koneksi di koneksi.php)
HTML/CSS/Bootstrap: untuk antarmuka pengguna
JavaScript: untuk interaktivitas tambahan 
Server: XAMPP / Laragon

🌟 Fitur Utama dan Tambahan
Fitur Utama:

Web Dinamis dengan forntend dan backand
Autentikasi login pengguna (login.php)
Daftar menu cafe dan detail produk (menu-caffe.php, detail.php)
Pemesanan sementara dengan penyimpanan sesi  (Di dalam Index.php)
CRUD admin/menu-caffe.php menggunakan database untuk CRUD menu cafe
Form session Pesanan Masuk beserta tombol aksi/proses seperti tombol selesai dan batal.
Form session Pesanan selesai untuk menunjukan pesanan-pesanan yangg telah selesai beserta tombol hapus pesanan selesai, cetak laporan dan reset semua pesanan yg telah di selesaikan
Header dan footer dinamis untuk tampilan konsisten (header.php, footer.php) 
Cetak Pdf Untuk mencetak dan Melihat Laporan Pesanan Selesai Dan total Pendapatan


Fitur Tambahan:

Validasi input dari pengguna
Tiap Aksi atau tombol untuk pelakukan proses ada konfirmasi notifikasi sistem
jam waktu terkini didalam fungsi.php 
Tampilan dinamis berdasarkan data dari database dan local storage
Struktur kode terpisah untuk kemudahan pemeliharaan 

▶️ Cara Menjalankan Aplikasi

    Instalasi XAMPP atau LAMP

        Pastikan Apache dan MySQL aktif.

    Kloning atau Salin Proyek

        Salin semua file ke dalam direktori Laragon/ htdocs/ (untuk XAMPP) atau direktori web server Anda.

    Konfigurasi Database

        Buat database baru di phpMyAdmin/Adminer, sesuaikan konfigurasi koneksi pada koneksi.php.

        Import struktur dan data tabel (Didalam Folder DB, mohon pastikan Anda memiliki file SQL jika diperlukan).

    Akses di Browser

        Buka http://localhost/nama-folder-proyek/index.php melalui browser.



Username dan password  Menu Admin : chova - chova

