<?php
 include_once "../fungsi.php";
 cekSesi();
 // tangkap id_menu
 $id_menu = $_GET['id_menu'];
// baca nama file foto
$sql = "SELECT foto FROM menu WHERE id_menu = '$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data = $query->fetch(PDO::FETCH_OBJ);
// hapus file foto
if(file_exists('../aset/gambar/'.$data->foto)) {
    unlink('../aset/gambar/'.$data->foto);
}
 // hapus data dari tabel menu
 $sql = "DELETE FROM menu WHERE id_menu = '$id_menu'";
 $query = $koneksi->prepare($sql);
 $query->execute();
 
 // kembali ke objek-wisata.php
 header('location:menu-caffe.php');
 ?>