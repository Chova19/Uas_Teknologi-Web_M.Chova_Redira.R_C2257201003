<?php
include_once "fungsi.php";
include_once "header.php";
// tangkap kiriman id_menu
$id_menu = $_GET['id_menu'];
$sql = "SELECT * FROM view_menu_jenis WHERE id_menu = '$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data = $query->fetch(PDO::FETCH_OBJ);
?>
 
	<!-- detail menu caffe -->
	<h2 class="text-secondary text-center"><?php echo $data->nama_menu;?></h2>
	<div class="row">
		<div class="sm-6 md-6 col mb0">
			 <a href="#">
				<img src="aset/gambar/<?php echo $data->foto;?>">
			 </a>
		</div>
		<div class="sm-6 md-6 col mb0">
			<dl>
				 <dt><b>Jenis Menu</b></dt>
				 <dd><?php echo $data->nama_jenis;?></dd>
				 
				 <dt><b>Deskripsi</b></dt>
				 <dd><?php echo $data->penjelasan;?></dd>

				 <dt><b>stok</b></dt>
				 <dd><?php echo stok($data->stok);?></dd>
				 
				 <dt><b>harga</b></dt>
				 <dd><?php echo  formatHarga($data->harga);?></dd>
			</dl>
		</div>
	</div>
	<!-- foto menu caffe -->
 
<?php
include_once "footer.php";
?>