<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
 <style type="text/css">
 	.adminpanel{width: 500px;color: #999;margin: 30px auto 0;padding: 50px;border: 1 solid #ddd;}


 </style>
<div class="main">
<h1>Admin Panel</h1>
  <div class="adminpanel">
  	<h2 style="color: blue;"> 
  	<table class="tblone" style="border: solid blue;">
      <tr ><th colspan="3"><center>Admin Profile</center></th></tr>
      <tr ><td colspan="2">Admin ID :</td><td ><?php echo $_SESSION['adminId']; ?></td></tr>
      <tr></tr>
  		<tr><td colspan="2">Admin Name :</td><td colspan="2"><?php echo $_SESSION['adminName']; ?></td></tr>
      <tr></tr>
      <tr><td colspan="2">Admin UserName :</td><td><?php echo $_SESSION['adminUser']; ?></td></tr>
  	</table>
  	
   
</h2>

  </div>


	
</div>
<?php include 'inc/footer.php'; ?>