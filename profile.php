<?php include 'inc/header.php'; 

?>


<?php 
Session::checkSession();//check logged in or out
$userid=Session::get("userid");
 ?> 
<style type="text/css">
	.profile{
		width: 530px;
		margin: 0 auto;
		 border: 1px solid #ddd; 
		 padding:30px 50px 50px;
		 width: 440px;

	}
</style>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $updateUser=$usr->UpdateUserData($userid,$_POST);
   

  
   
}
 ?>


<div class="main">
<h1>My Profile</h1>
<div class="profile">
	<?php 

    if (isset($updateUser)) {
    	echo $updateUser;
    }
	 ?>
	
	
	<form action="" method="post">
<?php 
	$getData=$usr->getUserData($userid);
   if ($getData) {
   	$result=$getData->fetch_assoc();
   	 
   

?>
		<table class="tbl"> 

				 <tr>
			   <td>Name</td>
			   <td> <input name="name"  type="text" value="<?php echo $result['name']; ?>"/></td>
			 </tr>
			  <tr>
			   <td>User Name</td>
			  <td> <input name="username"  type="text" value="<?php echo $result['username']; ?>"/> </td>
			 </tr>  
			 <tr>
			   <td>Email</td>
			  <td> <input name="email"  type="text" value="<?php echo $result['email']; ?>"/></td>
			 </tr>
			 
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login_submit"  value="Update">
			   </td>
			 </tr>
       </table>
      <?php  } ?>
	   </form>
	</div>
	 


	
</div>
<?php include 'inc/footer.php'; ?>