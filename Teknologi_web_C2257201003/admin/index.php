<?php
include_once "../fungsi.php";
include_once "header.php";
?>
	 
	 <!-- form login -->
	 <center>
	 
<?php
 if(isset($_POST['login'])) {
	$user_id = $_POST['user_id'];
	$sandi = md5($_POST['sandi']);
	cekLogin($user_id, $sandi);
 }
 ?>	 
	 	 
		<form action="" method="post">
			<div class="row flex-center mb0">
				<div class="form-group">
					<input type="text" placeholder="User ID" name="user_id" required>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Sandi" name="sandi" required>
				</div>
			</div>
			<button type="submit" class="btn-secondary" name="login">Login</button>
		</form>
	 </center>
	 <!-- form login -->
 
<?php
include_once "footer.php";
?>