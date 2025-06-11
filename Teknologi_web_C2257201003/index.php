<?php
session_start();
include "koneksi.php";
include_once "fungsi.php";
include_once "header.php";

// Inisialisasi array pesanan jika belum ada
if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

// Tambah pesanan
if (isset($_GET['tambah'])) {
    $id_menu = filter_input(INPUT_GET, 'tambah', FILTER_VALIDATE_INT);
    $stmt = $koneksi->prepare("SELECT * FROM menu WHERE id_menu = ?");
    $stmt->execute([$id_menu]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data && $data['stok'] == 'A') {
        if (isset($_SESSION['pesanan'][$id_menu])) {
            $_SESSION['pesanan'][$id_menu]['jumlah']++;
        } else {
            $_SESSION['pesanan'][$id_menu] = [
                'data' => $data,
                'jumlah' => 1
            ];
        }
    } else {
        $_SESSION['notifikasi'] = "Stok habis, menu tidak dapat dipesan!";
    }
    header("Location: index.php");
    exit;
}

// Kurangi pesanan
if (isset($_GET['kurangi'])) {
    $id_menu = filter_input(INPUT_GET, 'kurangi', FILTER_VALIDATE_INT);
    if (isset($_SESSION['pesanan'][$id_menu])) {
        if ($_SESSION['pesanan'][$id_menu]['jumlah'] > 1) {
            $_SESSION['pesanan'][$id_menu]['jumlah']--;
        } else {
            unset($_SESSION['pesanan'][$id_menu]);
        }
    }
    header("Location: index.php");
    exit;
}

// Hapus pesanan
if (isset($_GET['hapus'])) {
    $id_menu = filter_input(INPUT_GET, 'hapus', FILTER_VALIDATE_INT);
    unset($_SESSION['pesanan'][$id_menu]);
    header("Location: index.php");
    exit;
}

// Reset semua pesanan
if (isset($_GET['reset'])) {
    unset($_SESSION['pesanan']);
    header("Location: index.php");
    exit;
}
?>

<!-- Notifikasi -->
<?php if (isset($_SESSION['notifikasi'])): ?>
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px;">
        <?= $_SESSION['notifikasi']; ?>
    </div>
    <?php unset($_SESSION['notifikasi']); ?>
<?php endif; ?>

<!-- Foto menu -->
<div class="row">
<?php
$sql = "SELECT * FROM view_menu_jenis";
$query = $koneksi->prepare($sql);
$query->execute();
while ($data = $query->fetch(PDO::FETCH_OBJ)) {
?>
    <div class="sm-6 md-4 col mb0" style="margin-bottom: 20px;">
        <a href="detail.php?id_menu=<?= $data->id_menu ?>">
            <img src="aset/gambar/<?= $data->foto ?>" alt="<?= $data->nama_menu ?>" width="150">
        </a>
        <br>
        <strong><?= $data->nama_menu ?></strong><br>
        <em>Stok: <?= stok($data->stok) ?></em><br>
        <em>Harga: <?= formatHarga($data->harga) ?></em><br>

        <?php if ($data->stok == 'A'): ?>
            <a href="?tambah=<?= $data->id_menu ?>"><button>Tambah ke Pesanan</button></a>
        <?php else: ?>
            <button disabled style="color: red;">Stok Habis</button>
        <?php endif; ?>
    </div>
<?php
}
?>
</div>

<hr>

<!-- Daftar Pesanan -->
<h3>Pesanan</h3>
<?php if (empty($_SESSION['pesanan'])): ?>
    <p><em>Belum ada pesanan.</em></p>
<?php else: ?>
    <ul>
        <?php
        $total = 0;
        foreach ($_SESSION['pesanan'] as $id_menu => $item):
            $nama = $item['data']['nama_menu'];
            $harga = $item['data']['harga'];
            $jumlah = $item['jumlah'];
            $subtotal = $harga * $jumlah;
            $total += $subtotal;
        ?>
        <li>
            <?= htmlspecialchars($nama) ?> : <?= $jumlah ?> x <?= formatHarga($harga) ?> = <?= formatHarga($subtotal) ?>
            <a href="?tambah=<?= $id_menu ?>">[+]</a>
            <a href="?kurangi=<?= $id_menu ?>">[-]</a>
            <a href="?hapus=<?= $id_menu ?>" onclick="return confirm('Hapus item ini?')">[Hapus]</a>
        </li>
        <?php endforeach; ?>
    </ul>
    <h4>Total Bayar: <?= formatHarga($total) ?></h4>
    <a href="?reset=1" onclick="return confirm('Yakin reset semua pesanan?')">[Reset Semua Pesanan]</a>
<?php endif; ?>

<?php include_once "footer.php"; ?>
