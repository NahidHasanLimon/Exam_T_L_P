<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr= new User();
?>
<?php
  // Session::checkLogin();
?>
 <style type="text/css">
 	.adminpanel{width: 500px;color: #999;margin: 30px auto 0;padding: 50px;border: 1 solid #ddd;}


 </style>
  <?php 
  
if($_SERVER['REQUEST_METHOD']=='POST'){
   $addAdmin= $usr->addAdmin($_POST);
   
}
//Get Total
 

  ?>
<div class="main">
<h1>Admin Panel</h1>
  <div class="adminpanel">
    <?php 
       if (isset($addAdmin)) {
         echo $addAdmin;
       }
     ?>
  	<h1> Add Admin</h1>
  	<form name="" action="" method="post">
     <table>
     <tr>
     	
     	<td>Name:</td>
     	<td><input type="text" name="adminName" required=""></td>
     </tr>
      <tr>
     	
     	<td>UserName:</td>
     	<td><input type="text" name="adminUser" required=""></td>
     </tr>
      <tr>
     	
     	<td>Password:</td>
     	<td><input type="text" name="adminPass" required=""></td>
     </tr>
      
   <tr>
   	<td></td><td></td>
   	<td> <input type="submit" name="add_admin" value="Add" >
   	</td>
   </tr>

      </table>
      </form>
  </div>


	
</div>
<?php include 'inc/footer.php'; ?>