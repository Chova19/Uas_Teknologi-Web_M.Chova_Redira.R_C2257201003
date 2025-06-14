<?php 
// Hindari session_start() ganda
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// pengaturan waktu default
date_default_timezone_set("Asia/Jakarta");

// sertakan file koneksi.php
include_once "koneksi.php";

// ✅ Hanya deklarasikan SEKALI
function stok($stok) {
    return ($stok == "A") ? "Ada" : "Habis";
}

// format Harga
function formatHarga($harga) {
    if ($harga != 0) {
        $harga = number_format($harga, 0, ",", ".");
        $harga = "Rp $harga,-";
    } else {
        $harga = "Diskon";
    }
    return $harga;
}

// fungsi tanggal dan jam sekarang
function tampilkanWaktu() {
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    
    $tanggal = $hari[date("w")] . ", " . date("d") . " " . $bulan[date("m") - 1] . " " . date("Y");
    $jam = date("H:i") . " WIB";
    
    return "$tanggal - $jam";
}

// cek login
function cekLogin($user_id, $sandi) {
    global $koneksi;
    $sql = "SELECT * FROM pengguna WHERE user_id = ? AND sandi = ?";
    $query = $koneksi->prepare($sql);
    $query->execute([$user_id, $sandi]);
    $data = $query->fetch(PDO::FETCH_OBJ);
    
    if (!$data) {
        echo "<b class='text-danger'>User ID atau Sandi salah!</b><br><br>";
    } else {
        $_SESSION['user_id'] = $data->user_id;
        $_SESSION['nama_pengguna'] = $data->nama_pengguna;
        $_SESSION['kode'] = "1niKod3ke4man@n";
        header('location:menu-caffe.php');
        exit;
    }
}

// cek sesi pengguna
function cekSesi() {
    if (
        empty($_SESSION['user_id']) ||
        empty($_SESSION['nama_pengguna']) ||
        $_SESSION['kode'] !== "1niKod3ke4man@n"
    ) {
        header('location:pesan.php');
        exit;
    }
}
?>
