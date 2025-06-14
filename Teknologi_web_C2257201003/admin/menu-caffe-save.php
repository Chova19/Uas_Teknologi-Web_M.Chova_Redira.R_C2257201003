<?php
 include_once "../fungsi.php";
 cekSesi();
 // tangkap kiriman
 $nama_menu = $_POST['nama_menu'];
 $id_jenis = $_POST['id_jenis'];
 $penjelasan = $_POST['penjelasan'];
 $stok = $_POST['stok'];
 $harga = $_POST['harga'];
 $foto = $_FILES['foto']['name'];
 // simpan ke tabel
 $sql = "INSERT INTO menu (nama_menu, id_jenis, penjelasan, stok, harga, foto) VALUES ('$nama_menu', '$id_jenis', '$penjelasan', '$stok', '$harga', '$foto')";
 $query = $koneksi->prepare($sql);
 $query->execute();
 // simpan foto ke folder gambar
 move_uploaded_file($_FILES['foto']['tmp_name'], '../aset/gambar/'.$foto);
 // kembali ke menu-caffe.php
 header('location:menu-caffe.php');
 ?>