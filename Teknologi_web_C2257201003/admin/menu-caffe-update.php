<?php
 include_once "../fungsi.php";
 cekSesi();
 // tangkap kiriman
 $id_menu = $_POST['id_menu'];
 $nama_menu = $_POST['nama_menu'];
 $id_jenis = $_POST['id_jenis'];
 $penjelasan = $_POST['penjelasan'];
 $stok = $_POST['stok'];
 $harga = $_POST['harga'];
 $foto = $_FILES['foto']['name'];
 // cek foto
 if(!$_FILES['foto']['name']) { // jika foto tidak diganti
	$sql = "UPDATE menu SET nama_menu='$nama_menu', id_jenis='$id_jenis', penjelasan='$penjelasan', stok='$stok',harga='$harga' WHERE id_menu='$id_menu'";
 }
 else { // jika foto diganti
	 // baca nama file gambar kemudian hapus
	 $sql = "SELECT foto FROM menu WHERE id_menu='$id_menu'";
	 $query = $koneksi->prepare($sql);
	 $query->execute();
	 $data = $query->fetch(PDO::FETCH_OBJ);
	 if(file_exists('../aset/gambar/'.$data->foto)) {
		unlink('../aset/gambar/'.$data->foto);
	 }
	 // upload file baru
	 move_uploaded_file($_FILES['foto']['tmp_name'], '../aset/gambar/'.$foto);
	 // simpan ke tabel
	$sql = "UPDATE menu SET nama_menu='$nama_menu', id_jenis='$id_jenis', penjelasan='$penjelasan', stok='$stok',harga='$harga', foto='$foto' WHERE id_menu='$id_menu'";
 }
 // update data tabel objek
 $query = $koneksi->prepare($sql);
 $query->execute();
 // kembali ke objek-wisata.php
 header('location:menu-caffe.php');
 ?>