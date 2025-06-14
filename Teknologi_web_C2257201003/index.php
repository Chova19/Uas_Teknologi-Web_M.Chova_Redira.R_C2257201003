<?php
session_start();
include "koneksi.php";
include_once "fungsi.php";
include_once "header.php";

$sql = "SELECT * FROM view_menu_jenis";
$query = $koneksi->prepare($sql);
$query->execute();
$menus = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
  img { max-width: 100%; height: auto; }
  .form-control { width: 100%; max-width: 400px; margin: 5px auto; display: block; }
  .pesanan-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    padding-bottom: 5px;
    border-bottom: 1px dashed #ccc;
  }
  .pesanan-buttons a {
    padding: 2px 6px;
    margin-left: 4px;
    text-decoration: none;
    border-radius: 3px;
    font-size: 14px;
  }
  .btn-tambah { background-color: #007bff; color: white; }
  .btn-kurang { background-color: #ffc107; color: black; }
  .btn-hapus  { background-color: #dc3545; color: white; }
  .notif-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
    text-align: center;
  }
  .notif-cancel {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
    text-align: center;
  }
</style>

<?php if (isset($_GET['status']) && $_GET['status'] === 'sent'): ?>
  <div id="notifKirim" class="notif-success">Terima kasih! Pesanan Anda telah berhasil dikirim.</div>
  <script>setTimeout(() => { const e=document.getElementById('notifKirim'); if(e) e.style.display='none'; }, 3000);</script>
<?php elseif (isset($_GET['status']) && $_GET['status'] === 'cancel'): ?>
  <div id="notifCancel" class="notif-cancel">Pesanan Anda telah dibatalkan. Silakan pesan kembali jika diperlukan.</div>
  <script>setTimeout(() => { const e=document.getElementById('notifCancel'); if(e) e.style.display='none'; }, 3000);</script>
<?php endif; ?>

<div class="row">
<?php foreach ($menus as $data): ?>
  <div class="sm-12 md-4 col">
    <a href="detail.php?id_menu=<?= $data['id_menu'] ?>">
      <img src="aset/gambar/<?= $data['foto'] ?>" alt="<?= $data['nama_menu'] ?>">
    </a>
    <strong><?= $data['nama_menu'] ?></strong><br>
    <em>Stok: <?= stok($data['stok']) ?></em><br>
    <em>Harga: <?= formatHarga($data['harga']) ?></em><br>
    <?php if ($data['stok'] === 'A'): ?>
      <button onclick="tambahPesanan(<?= $data['id_menu'] ?>, '<?= htmlspecialchars($data['nama_menu'], ENT_QUOTES) ?>', <?= $data['harga'] ?>)" class="paper-btn btn-small btn-primary">Tambah ke Pesanan</button>
    <?php else: ?>
      <button class="paper-btn btn-small btn-danger" disabled>Stok Habis</button>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
</div>

<hr>

<h3 class="text-center">Pesanan</h3>
<ul id="daftarPesanan" style="list-style: none; padding: 0;"></ul>
<h4 class="text-center">Total Bayar: <span id="totalBayar">Rp 0</span></h4>

<div class="text-center mt-2">
  <input type="text" id="namaPemesan" placeholder="Masukkan nama Anda" class="form-control">
  <input type="text" id="noHpPemesan" placeholder="Nomor HP" class="form-control">
  <input type="email" id="emailPemesan" placeholder="Email" class="form-control">
  <input type="text" id="mejaPemesan" placeholder="No. Meja" class="form-control">
  <button onclick="kirimPesanan()" class="paper-btn btn-primary">Pesan</button>
  <button onclick="batalPesanan()" class="paper-btn btn-danger">Batal</button>
</div>

<script>
let pesanan = JSON.parse(sessionStorage.getItem('pesanan')) || [];

function simpanPesanan() {
  sessionStorage.setItem('pesanan', JSON.stringify(pesanan));
}

function renderPesanan() {
  const list = document.getElementById('daftarPesanan');
  const totalEl = document.getElementById('totalBayar');
  list.innerHTML = '';
  let total = 0;

  if (pesanan.length === 0) {
    list.innerHTML = '<p class="text-center"><em>Belum ada pesanan.</em></p>';
    totalEl.textContent = 'Rp 0';
    return;
  }

  pesanan.forEach((p, i) => {
    const subtotal = p.harga * p.jumlah;
    total += subtotal;
    const li = document.createElement('li');
    li.className = 'pesanan-item';
    li.innerHTML = `
      <span>${p.nama} : ${p.jumlah} x Rp ${p.harga.toLocaleString()} = Rp ${subtotal.toLocaleString()}</span>
      <span class="pesanan-buttons">
        <a href="#" class="btn-tambah" onclick="tambahPesanan(${p.id}, '${p.nama}', ${p.harga}); return false;">+</a>
        <a href="#" class="btn-kurang" onclick="kurangPesanan(${i}); return false;">-</a>
        <a href="#" class="btn-hapus" onclick="hapusPesanan(${i}); return false;">x</a>
      </span>
    `;
    list.appendChild(li);
  });

  totalEl.textContent = 'Rp ' + total.toLocaleString();
}

function tambahPesanan(id, nama, harga) {
  const idx = pesanan.findIndex(p => p.id === id);
  if (idx !== -1) pesanan[idx].jumlah++;
  else pesanan.push({ id, nama, harga, jumlah: 1 });
  simpanPesanan();
  renderPesanan();
}

function kurangPesanan(i) {
  if (pesanan[i].jumlah > 1) pesanan[i].jumlah--;
  else pesanan.splice(i, 1);
  simpanPesanan();
  renderPesanan();
}

function hapusPesanan(i) {
  pesanan.splice(i, 1);
  simpanPesanan();
  renderPesanan();
}

function batalPesanan() {
  if (pesanan.length === 0) {
    alert("Tidak ada pesanan untuk dibatalkan.");
    return;
  }

  if (confirm("Yakin ingin membatalkan pesanan ini?")) {
    pesanan = [];
    simpanPesanan();
    renderPesanan();
    window.location.href = "?status=cancel";
  }
}

function kirimPesanan() {
  const nama = document.getElementById('namaPemesan').value.trim();
  const nohp = document.getElementById('noHpPemesan').value.trim();
  const email = document.getElementById('emailPemesan').value.trim();
  const meja = document.getElementById('mejaPemesan').value.trim();

  if (pesanan.length === 0) {
    alert("Silakan pilih minimal 1 menu untuk dipesan.");
    return;
  }

  if (!nama || !nohp || !email || !meja) {
    alert("Semua data pemesan wajib diisi!");
    return;
  }

  const total = pesanan.reduce((sum, item) => sum + item.harga * item.jumlah, 0);
  const dataPesanan = {
    nama, nohp, email, meja,
    waktu: new Date().toLocaleString(),
    items: pesanan,
    total: total
  };

  let daftar = JSON.parse(localStorage.getItem('daftarPesanan')) || [];
  daftar.push(dataPesanan);
  localStorage.setItem('daftarPesanan', JSON.stringify(daftar));

  pesanan = [];
  simpanPesanan();
  renderPesanan();
  window.location.href = "?status=sent";
}

renderPesanan();
</script>

<?php include_once "footer.php"; ?>
