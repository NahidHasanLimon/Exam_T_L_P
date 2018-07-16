<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	$exm_user= new exam();

?>
<?php
  // Session::checkLogin();
?>
 <?php 
 if (isset($_GET['delque']))
 {
   $quesNo=$_GET['delque'];
   $delque=$exm_user->deleteQuestion($quesNo);
 }

  ?>

 
<div class="main">
	<h1>Manage - Question Retrieve </h1>
	<?php 
  if (isset($_GET['$delque'])) {
    echo $delque;
  }


   ?>
  <div class="questionlist"></div>
   <table class="tblone">
   	 <tr>
   	 	<th width="10%" >Serial_No</th>
      <th width="70%">Questions</th>
      <th width="20%">Actions</th>

   	 </tr>
 <?php 

$quesData= $exm_user->getAllQuestion_BY_ORDER();
if($quesData)
{
	$i=0;
  while ($result= $quesData->fetch_assoc()) {
  	 $i++;
 

  ?>

   	  <tr>
   	   <td><?php  echo $i; ?></td>
	   	 	<td><?php echo  $result['ques']; ?></td>
	   	 	<td> 
	   	 		<a onclick="return confirm('Are u sure to Delete Question ?')" href="?delque=<?php echo  $result['quesNo']; ?>">Remove
          </a>

	   	 	</td>
	   	 

   	 </tr>

<?php } } ?>
   	 
   </table>

 </div>


  
</div>
<?php include 'inc/footer.php'; ?>