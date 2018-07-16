<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr= new User();
?>
<?php
  // Session::checkLogin();
?>



 
 <?php  
 if(isset($_GET['dis']))
 {
  $dblid= (int)$_GET['dis'];
  $dblUser=$usr->DisableUser($dblid);

 } 
 
 if(isset($_GET['ena']))
 {
  $EnableID= (int)$_GET['ena'];
  $EnableUser=$usr->EnableUser($EnableID);

 }
  if(isset($_GET['del']))
 {
  $DeleteID= (int)$_GET['del'];
  $DeleteUser=$usr->DeleteUser($DeleteID);

 }

  ?>
<div class="main">
	<h1>Manage - All Users </h1>
	<?php 
       if (isset($dblUser)) {
       	echo " User Inactivated  Successfully";
       }
       if (isset($EnableUser)) {
       	echo " User Activated  Successfully";
       }
       if (isset($DeleteUser)) {
       	echo " User Deleted  Successfully";
       	
       }
	 ?>
 


  <div class="manageuser"></div>
   <table class="tblone">
   	 <tr>
   	 	<th>Serial_No</th>
   	 	<th>Name</th>
   	 	<th>User Name</th>
   	 	<th>Email Address</th>
   	 	<th>User Status</th>
   	 </tr>
 <?php 

$userData= $usr->getAllUser();
if($userData)
{
	$i=0;
  while ($result= $userData->fetch_assoc()) {
  	 $i++;
  

  ?>
   	  <tr>
   	  	 <td>
	
    <?php 
		   if($result['status']=='1')
		   {
		   	echo "<span class='error'>".$i."</span>";

		   }
		  

		   else
		   {
		   	echo "<span class='success'>".$i."</span>";
		   }

    ?>
   	  	 </td>

	   	 
	   	 	<td><?php  echo  $result['name']; ?></td>
	   	 	<td><?php  echo  $result['username']; ?></td>
	   	    <td><?php  echo $result['email']; ?></td>

	   	 	<td> <?php 

	   	 	if($result['status']=='0')
	   	 	{ ?>
	   	 		<a onclick="return confirm('Confirm to Disable ?')" href="?dis=<?php echo  $result['userid']; ?>">Disable</a>

	   	 	<?php } else { ?>
	   	 		<a onclick="return confirm('Confirm to Enable ?')" href="?ena=<?php echo  $result['userid']; ?>">Enable</a>

	   	 	<?php }



	   	 	?>
	   	 		||<a onclick="return confirm('Confirm to Delete ?')" href="?del=<?php echo  $result['userid']; ?>">Remove</a>

	   	 		
	   	 		

	   	 	</td>
	   	 

   	 </tr>

   	 <?php } } ?>
   </table>


  </div>


	
</div>
<?php include 'inc/footer.php'; ?>