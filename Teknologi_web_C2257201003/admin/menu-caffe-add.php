<?php
 include_once "../fungsi.php";
 cekSesi();
 include_once "header.php";
 ?>

	<!-- form menu caffe -->
	<center>
		<h2>Tambah Menu Caffe</h2>
		<a href="menu-caffe.php">Kembali</a> :: <a href="keluar.php">Logout</a>
		<br><br>
	</center>

 <div class="row col margin-none">
	 <div class="alert alert-secondary padding">
		Semua kolom wajib diisi. Harga tiket ditulis tanpa tanda titik dan koma, jika tidak ada harga  tuliskan nol.
	 </div>
 </div>

<form action="menu-caffe-save.php" method="post" enctype="multipart/form-data">
<div class="row">
	<div class="sm-6 col">
		<div class="form-group">
			<label>Nama</label>
			<input class="input-block" type="text" placeholder="Nama menu caffe" name="nama_menu" required>
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input class="input-block" type="file" name="foto" required>
		</div>
		<div class="form-group">
			<label>jenis</label>
			<select name="id_jenis" class="input-block" required>
				<option value="">Pilih jenis</option>				
<?php
$sql = "SELECT * FROM jenis";
$query = $koneksi->prepare($sql);
$query->execute();
while($data = $query->fetch(PDO::FETCH_OBJ)) {
?>
				<option value="<?php echo $data->id_jenis; ?>"><?php echo $data->nama_jenis; ?></option>
<?php
}
?>
			</select>
	</div>
	<div class="sm-6 col">
		<div class="form-group">
			<label>Deskripsi</label>
			<textarea rows="3" class="input-block" name="penjelasan" placeholder="Deskripsi/penjelasan menu..."></textarea>
		</div>
		<div class="form-group">
			<label>Stok</label>
			<label class="paper-radio">
				<input type="radio" name="stok" value="A" required> <span>ADA</span>
			</label>
			<label class="paper-radio">
				<input type="radio" name="stok" value="H" required> <span>HABIS</span>
			</label>
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input class="input-block" type="number" placeholder="Tanpa titik dan koma" name="harga" required>
		</div>
		<div class="form-group">
        <div class="row">
  <div class="col sm-6">
    <button class="paper-btn btn-success btn-block btn-lg" type="submit" style="width: 120px; padding: 10px; border: 2px solid #4CAF50; border-radius: 5px;" title="Simpan dan terbitkan menu">
      Simpan
    </button>
  </div>
  <div class="col sm-6">
    <button class="paper-btn btn-secondary btn-block btn-lg" type="reset" style="width: 100px; padding: 10px; border: 2px solid #6C757D; border-radius: 5px;" title="Hapus semua data dan kosongkan formulir">
      Batal
    </button>
  </div>
</div>
		</div>
	</div>
</div>
</form>
		<!-- form menu caffe -->

 <?
 include_once "footer.php";
 ?>
