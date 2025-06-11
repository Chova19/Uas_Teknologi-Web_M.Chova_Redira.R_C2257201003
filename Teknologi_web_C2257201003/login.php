<?php
include_once "header.php";
?>

 <!-- form login -->
 <center>
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