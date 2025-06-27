📋 Sistem Pemesanan Menu Cafe Berbasis Web

📝 Deskripsi Proyek

Sistem ini merupakan aplikasi berbasis web untuk memudahkan pelanggan memesan menu di sebuah kafe secara online. Aplikasi menyediakan fitur katalog menu, detail produk, sistem pemesanan sementara, dan manajemen data pengguna. Proyek ini dibangun menggunakan PHP dengan struktur modular yang terdiri dari beberapa file utama seperti index.php, login.php, dan menu-caffe.php dll.

⚙️ Teknologi yang Digunakan

    Bahasa Pemrograman: PHP
    Database: MySQL (melalui koneksi di koneksi.php)
    HTML/CSS/Bootstrap: untuk antarmuka pengguna
    JavaScript: untuk interaktivitas tambahan 
    Server: XAMPP / Laragon

🌟 Fitur Utama:

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

    Desain yang responsif
    Validasi data dan fitur keamanan pencegahan masuk menuju menu admin tanpa login
    Tiap Aksi atau tombol untuk melakukan proses ada konfirmasi notifikasi sistem
    jam waktu terkini didalam fungsi.php 
    Tampilan dinamis berdasarkan data dari database dan local storage
    Struktur kode terpisah untuk kemudahan pemeliharaan 

▶️ Cara Menjalankan Aplikasi

    Instalasi XAMPP atau LAMP

        Pastikan Apache dan MySQL aktif.

    Kloning atau Salin Proyek

        Salin semua file ke dalam direktori Laragon/ htdocs/ (untuk XAMPP) atau direktori web server Anda.

    Konfigurasi Database

        Buat database baru dengan nama c2257201003 di phpMyAdmin/Adminer, sesuaikan konfigurasi koneksi pada koneksi.php.

        Import struktur dan data tabel (Didalam Folder DB, mohon pastikan Anda memiliki file SQL jika diperlukan).

    Akses di Browser

        Buka http://localhost/nama-folder-proyek/index.php melalui browser.


Screenshot Aplikasi Sistem Informasi Pemesanan Menu Cafe Berbasis Web

![Screenshot 2025-06-14 071722](https://github.com/user-attachments/assets/52c8f08c-677b-4245-a2c5-393ea7de7109)
![Screenshot 2025-06-15 003008](https://github.com/user-attachments/assets/4ed42d6f-2985-491b-a9d8-fd37d2942fc7)
![Screenshot 2025-06-14 071803](https://github.com/user-attachments/assets/de5b0f85-8f3f-4497-bec1-a6d0e8aae11d)
![Screenshot 2025-06-14 071959](https://github.com/user-attachments/assets/6480e11a-32b2-4d4d-959d-fe9f67ab3c63)
![Screenshot 2025-06-14 072038](https://github.com/user-attachments/assets/da61fb78-81a6-48d7-9a57-036b4e999aa1)
![Screenshot 2025-06-14 072239](https://github.com/user-attachments/assets/b7fa2005-b99c-45a5-9185-98dff3095957)
![Screenshot 2025-06-14 072321](https://github.com/user-attachments/assets/94584612-6c49-428a-b7b8-3d0d6d9b7888)
![Screenshot 2025-06-14 072453](https://github.com/user-attachments/assets/93c94c4d-39c6-4e3d-b4c8-aa42107e5516)
![Screenshot 2025-06-14 072827](https://github.com/user-attachments/assets/4cb914d1-b0b6-4dcd-a907-549442086699)
![Screenshot 2025-06-14 072924](https://github.com/user-attachments/assets/16daed35-5fd1-4a93-b1ca-a0ee0ccbc78e)
![Screenshot 2025-06-14 073050](https://github.com/user-attachments/assets/1e69a06d-53cb-4a6e-8af3-cd2779e17922)
![Screenshot 2025-06-14 073125](https://github.com/user-attachments/assets/0d5f3baf-8bf3-4f4b-b41b-dd15dbfb6514)
![Screenshot 2025-06-14 073228](https://github.com/user-attachments/assets/66dc77bb-2007-438c-8c44-e848cea15459)
![Screenshot 2025-06-14 073309](https://github.com/user-attachments/assets/0a5190db-63c3-495a-a631-0a21b07bbeef)
![Screenshot 2025-06-14 073340](https://github.com/user-attachments/assets/630719b7-b4f3-4204-b4f8-c8c3c118c456)
![Screenshot 2025-06-14 073436](https://github.com/user-attachments/assets/60c92e12-a71b-4e8f-b2b6-9432579cc9fc)
![Screenshot 2025-06-14 073521](https://github.com/user-attachments/assets/74f35143-d101-4500-9de5-a6b3b710afb9)
![Screenshot 2025-06-14 073552](https://github.com/user-attachments/assets/8af228c2-36f3-4bf7-8a7a-6d1ff3819798)
![Screenshot 2025-06-14 073933](https://github.com/user-attachments/assets/05a68d1e-692e-4cdc-a7ce-9e2772e77f4e)
![Screenshot 2025-06-14 074013](https://github.com/user-attachments/assets/41ceb380-5ee8-4d26-97c9-eff9c59eaae6)
![Screenshot 2025-06-14 074114](https://github.com/user-attachments/assets/0e9722d6-626c-4dcb-b9a0-0472fe8e56ba)
![Screenshot 2025-06-14 074216](https://github.com/user-attachments/assets/ffa78d5a-79a5-438a-9fab-b44b464ff95e)
![Screenshot 2025-06-14 074338](https://github.com/user-attachments/assets/17bfe0a8-4106-4ad4-891e-b474a7e0b940)
![Screenshot 2025-06-14 074432](https://github.com/user-attachments/assets/fb053abf-514e-4986-86b0-20a8309a47ab)
![Screenshot 2025-06-14 074506](https://github.com/user-attachments/assets/809a4090-4ffe-4d8a-bb5a-ae6174cf0d61)
![Screenshot 2025-06-14 074546](https://github.com/user-attachments/assets/7ea1a487-c6d5-4bd4-83c7-202d838da026)





Username dan password  Menu Admin : chova - chova




















