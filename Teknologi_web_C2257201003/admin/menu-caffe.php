<?php
include_once "../fungsi.php";
cekSesi();
include_once "header.php";
?>
 
		<!-- tabel daftar menu caffe -->
		<center>
			<h2>Data menu cafe</h2>
			<a href="menu-caffe-add.php">Tambah</a> :: <a href="keluar.php">Keluar</a>
			<br><br>
		</center>
	<table>
		<thead>
			<tr>
				 <th>No.</th>
				 <th>Nama/Jenis </th>
				 <th>Deskripsi</th>
				 <th>Harga</th>
				 <th>Foto</th>
				 <th>Aksi</th>
			</tr>
		</thead>
		<tbody>
<?php	
$nomor = 1;
$sql = "SELECT *FROM view_menu_jenis ORDER BY id_menu DESC";
$query = $koneksi->prepare($sql);
$query->execute();
while($data = $query->fetch(PDO::FETCH_OBJ)) {
?>			
			<tr>
				<td><?php echo $nomor; ?></td>
				<td>
					<?php echo $data->nama_menu;?>
					<br>
					<?php echo $data->nama_jenis;?>		
				</td>
				<td>
					Deskripsi : <?php echo $data->penjelasan;?>
				</td>
				<td>
					Stok :<?php echo stok($data->stok);?>
					<br>
					Harga : <?php echo formatHarga($data->harga);?>
				</td>
				<td>
					<img src="../aset/gambar/<?php echo $data->foto;?>" width="250">
				</td>
				<td>
					<a href="menu-caffe-edit.php?id_menu=<?php echo $data->id_menu;?>">Edit</a> | <a href="menu-caffe-delete.php?id_menu=<?php echo $data->id_menu;?>"onclick="return confirm('Anda yakin akan menghapus data ini?');">Hapus</a>
				</td>
			</tr>
<?php
$nomor++;
}
?>
		</tbody>
	</table>
<!-- tabel daftar menu caffe -->
 
 <?php
include_once "footer.php";
?>