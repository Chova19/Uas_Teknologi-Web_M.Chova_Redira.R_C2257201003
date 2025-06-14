<?php
include_once "../fungsi.php";
cekSesi();
include_once "header.php";
?>

<center>
  <h2>Data Menu Cafe</h2>
  <a href="menu-caffe-add.php" class="btn-primary">Tambah</a> :: <a href="keluar.php" class="btn-danger">Logout</a>
  <br><br>
</center>

<table class="table">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama/Jenis</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php
$nomor = 1;
$sql = "SELECT * FROM view_menu_jenis ORDER BY id_menu DESC";
$query = $koneksi->prepare($sql);
$query->execute();
while ($data = $query->fetch(PDO::FETCH_OBJ)) {
?>
    <tr>
      <td><?= $nomor++; ?></td>
      <td><?= $data->nama_menu; ?><br><small><?= $data->nama_jenis; ?></small></td>
      <td><?= $data->penjelasan; ?></td>
      <td>Stok: <?= stok($data->stok); ?><br>Harga: <?= formatHarga($data->harga); ?></td>
      <td><img src="../aset/gambar/<?= $data->foto; ?>" width="250"></td>
      <td>
        <a href="menu-caffe-edit.php?id_menu=<?= $data->id_menu; ?>" class="btn-warning">Edit</a><br>
        <a href="menu-caffe-delete.php?id_menu=<?= $data->id_menu; ?>" class="btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?');">Hapus</a>
      </td>
    </tr>
<?php } ?>
  </tbody>
</table>

<h3>Pesanan Masuk</h3>
<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>No HP</th>
      <th>Email</th>
      <th>No Meja</th>
      <th>Waktu</th>
      <th>Pesanan</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="daftarPesanan"></tbody>
</table>

<h3>Pesanan Selesai</h3>
<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>No HP</th>
      <th>Email</th>
      <th>Waktu</th>
      <th>Pesanan</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody id="pesananSelesai"></tbody>
</table>

<button onclick="cetakLaporan()" class="btn-secondary">Cetak Laporan</button>
<button onclick="resetSelesai()" class="btn-danger">Reset Semua Selesai</button>

<script>
const elMasuk = document.getElementById('daftarPesanan');
const elSelesai = document.getElementById('pesananSelesai');

let daftar = JSON.parse(localStorage.getItem('daftarPesanan')) || [];
let selesai = JSON.parse(localStorage.getItem('pesananSelesai')) || [];

function renderPesanan(data, target, isSelesai = false) {
  target.innerHTML = "";
  if (data.length === 0) {
    const colSpan = isSelesai ? 8 : 9;
    target.innerHTML = `
      <tr><td colspan="${colSpan}" style="text-align:center; font-style:italic;">
        ${isSelesai ? 'Belum ada pesanan yang selesai.' : 'Belum ada pesanan masuk.'}
      </td></tr>`;
    return;
  }

  data.forEach((item, i) => {
    const listPesanan = item.items.map(x => `${x.nama} (${x.jumlah})`).join(", ");
    const row = `
    <tr>
      <td>${i + 1}</td>
      <td>${item.nama}</td>
      <td>${item.nohp}</td>
      <td>${item.email}</td>
      ${!isSelesai ? `<td>${item.meja}</td>` : ""}
      <td>${item.waktu}</td>
      <td>${listPesanan}</td>
      <td>Rp ${item.total.toLocaleString()}</td>
      <td>
        ${isSelesai ? 
          `<button class='btn-danger' onclick="hapusSelesai(${i})">Hapus</button>` : 
          `<button class='btn-primary' onclick="selesaikan(${i})">Selesai</button><br><button class='btn-danger' onclick="hapusMasuk(${i})">Batal</button>`}
      </td>
    </tr>`;
    target.innerHTML += row;
  });
}

function selesaikan(i) {
  if (!confirm('Tandai pesanan ini sebagai selesai?')) return;
  selesai.push(daftar[i]);
  daftar.splice(i, 1);
  localStorage.setItem('daftarPesanan', JSON.stringify(daftar));
  localStorage.setItem('pesananSelesai', JSON.stringify(selesai));
  render();
}

function hapusSelesai(i) {
  if (!confirm('Yakin ingin menghapus pesanan selesai ini?')) return;
  selesai.splice(i, 1);
  localStorage.setItem('pesananSelesai', JSON.stringify(selesai));
  render();
}

function hapusMasuk(i) {
  if (!confirm('Yakin ingin membatalkan pesanan ini?')) return;
  daftar.splice(i, 1);
  localStorage.setItem('daftarPesanan', JSON.stringify(daftar));
  render();
}

function resetSelesai() {
  if (confirm('Yakin reset semua pesanan selesai?')) {
    localStorage.removeItem('pesananSelesai');
    selesai = [];
    render();
  }
}

function cetakLaporan() {
  let laporan = `
    <style>
      body { font-family: sans-serif; }
      table { border-collapse: collapse; width: 100%; }
      th, td { border: 1px solid #000; padding: 8px; text-align: left; }
      th { background: #f0f0f0; }
    </style>
    <h2 style='text-align:center'>Laporan Pesanan Selesai</h2>
    <table>
      <thead>
        <tr>
          <th>No</th><th>Nama</th><th>No HP</th><th>Email</th><th>Waktu</th><th>Pesanan</th><th>Total</th>
        </tr>
      </thead>
      <tbody>`;
  let totalPendapatan = 0;
  selesai.forEach((item, i) => {
    const list = item.items.map(x => `${x.nama} (${x.jumlah})`).join(", ");
    totalPendapatan += item.total;
    laporan += `<tr>
      <td>${i + 1}</td>
      <td>${item.nama}</td>
      <td>${item.nohp}</td>
      <td>${item.email}</td>
      <td>${item.waktu}</td>
      <td>${list}</td>
      <td>Rp ${item.total.toLocaleString()}</td>
    </tr>`;
  });
  laporan += `</tbody></table><h3 style="text-align:right">Total Pendapatan: Rp ${totalPendapatan.toLocaleString()}</h3>`;
  const win = window.open('', '', 'width=800,height=600');
  win.document.write(laporan);
  win.document.close();
  win.print();
}

function render() {
  renderPesanan(daftar, elMasuk);
  renderPesanan(selesai, elSelesai, true);
}

render();
</script>

<?php include_once "footer.php"; ?>
