<?php
session_start();
include 'koneksi.php';

// Inisialisasi array pesanan jika belum ada
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

// Tambah pesanan
if (isset($_GET['tambah'])) {
    $id_menu = $_GET['tambah'];
    $menu = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id_menu'");
    $data = mysqli_fetch_assoc($menu);

    if ($data) {
        // Tambahkan ke sesi
        $_SESSION['pesanan'][] = $data;
    }
    header("Location: pesan-sementara.php");
    exit;
}

// Hapus pesanan
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($_SESSION['pesanan'][$index]);
    $_SESSION['pesanan'] = array_values($_SESSION['pesanan']); // reindex
    header("Location: pesan-sementara.php");
    exit;
}
// Reset semua pesanan
if (isset($_GET['reset'])) {
    unset($_SESSION['pesanan']);
    header("Location: pesan-sementara.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Sementara</title>
</head>
<body>
    <h2>Daftar Menu</h2>
    <ul>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE stok = 'A'");
        while ($menu = mysqli_fetch_assoc($query)) {
            echo "<li>{$menu['nama_menu']} - Rp " . number_format($menu['harga']) . " 
            <a href='?tambah={$menu['id_menu']}'>[Tambah]</a></li>";
        }
        ?>
    </ul>

    <hr>

    <h2>Pesanan Anda</h2>
    <?php if (empty($_SESSION['pesanan'])): ?>
        <p>Tidak ada pesanan.</p>
    <?php else: ?>
        <ol>
            <?php 
            $total = 0;
            foreach ($_SESSION['pesanan'] as $index => $item):
                $total += $item['harga'];
            ?>
            <li>
                <?= $item['nama_menu'] ?> - Rp <?= number_format($item['harga']) ?> 
                <a href="?hapus=<?= $index ?>">[Hapus]</a>
            </li>
            <?php endforeach; ?>
        </ol>
        <h3>Total Bayar: Rp <?= number_format($total) ?></h3>
        <p><a href="?reset=1" onclick="return confirm('Yakin reset semua pesanan?')">[Reset Semua Pesanan]</a></p>
    <?php endif; ?>
</body>
</html>
