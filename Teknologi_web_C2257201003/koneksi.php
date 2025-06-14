<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'c2257201003';

try {
    $koneksi = new PDO("mysql:host=$db_host;port=3306;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // Aktifkan mode error exception untuk debugging yang lebih baik
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tampilkan pesan error jika gagal koneksi
    die("Koneksi gagal: " . $e->getMessage());
}
?>