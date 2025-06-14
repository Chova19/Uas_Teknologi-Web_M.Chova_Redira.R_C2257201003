<?php
include_once "../fungsi.php";
include_once "header.php";
cekSesi();
// tangkap id_menu
$id_menu = $_GET['id_menu'];
// baca data berdasarkan id_menu
$sql = "SELECT * FROM menu WHERE id_menu='$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data_menu = $query->fetch(PDO::FETCH_OBJ);
?>
	
	<!-- form menu cafe -->
	<center>
		<h2>Ubah Menu Caffe</h2>
		<a href="menu-caffe.php">Kembali</a> : :  <a href="keluar.php">Keluar</a>
		<br><br>
	</center>

<div class="row col margin-none">
	<div class="alert alert-secondary padding">
		Semua kolom wajib diisi. Harga tiket ditulis tanpa tanda titik dan koma, jika tidak ada tiket masuk tuliskan nol. Jika memilih foto baru maka foto lama akan dihapus, kosongkan foto jika tidak ingin diganti.
	</div>
</div>

<form action="menu-caffe-update.php" method="post" enctype="multipart/form-data">
<div class="row">
	<div class="sm-6 col">
		<div class="form-group">
			<label>Nama</label>
			<input class="input-block" type="text" value="<?php echo $data_menu->nama_menu; ?>" name="nama_menu" required>
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input class="input-block" type="file" name="foto">
		</div>
		<div class="form-group">
			<label>Jenis menu</label>
			<select name="id_jenis" class="input-block" required>
				<option value="">Jenis menu</option>
<?php
//include_once "../fungsi.php";
$sql = "SELECT * FROM jenis";
$query = $koneksi->prepare($sql);
$query->execute();
while($data = $query->fetch(PDO::FETCH_OBJ)) {
	$terpilih = ($data_menu->id_jenis==$data->id_jenis)?"selected":"";
?>
				<option value="<?php echo $data->id_jenis; ?>" <?php echo $terpilih; ?>><?php echo $data->nama_jenis; ?></option>
<?php
}
?>
			</select>
	</div>
	<div class="sm-6 col">
		<div class="form-group">
			<label>Deskripsi</label>
			<textarea rows="3" class="input-block" name="penjelasan" placeholder="Deskripsi menu caffe.."><?php echo $data_menu->penjelasan; ?></textarea>
		</div>
		<div class="form-group">
			<label>Stok</label>
			<label class="paper-radio">
				<input type="radio" name="stok" value="A" required <?php echo ($data_menu->stok=="A")?"checked":""; ?>> <span>Ada</span>
			</label>
			<label class="paper-radio">
				<input type="radio" name="stok" value="H" required <?php echo ($data_menu->stok=="H")?"checked":""; ?>> <span>Habis</span>
			</label>
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input class="input-block" type="number" value="<?php echo $data_menu->harga; ?>" name="harga" required>
			<input type="hidden" value="<?php echo $data_menu->id_menu; ?>" name="id_menu">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col sm-12">
					<input class="paper-btn btn-success btn-block" type="submit" value="Simpan" name="simpan">
				</div>
			</div>
		</div>
	</div>
</div>
</form>
	<!-- formm menu cafe -->
	
<?
include_once "footer.php";
?>