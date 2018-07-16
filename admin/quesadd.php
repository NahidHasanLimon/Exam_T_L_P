<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	$exm_user= new exam();
?>
<?php
  // Session::checkLogin();
?>
 <style type="text/css">
 	.adminpanel{width: 500px;color: #999;margin: 30px auto 0;padding: 9px;border: 1 solid #ddd;}


 </style>
 <?php 
  
if($_SERVER['REQUEST_METHOD']=='POST'){
   $addQuestion= $exm_user->addQuestion($_POST);
   
}
//Get Total
 $total=$exm_user->getTotalRows();
 $nextNo=$total+1;


  ?>
<div class="main">
<h1>Manage The Examination System By Admin Pannel</h1>
  <div class="adminpanel">
  	<?php 
       if (isset($addQuestion)) {
       	 echo $addQuestion;
       }
  	 ?>

  	<form action ="" method="post">
    <table>
    	
			<tr>
				<td>
					Question NO:
				</td>
				<td>
					<input type="number" value="<?php  if(isset($nextNo)){echo $nextNo;}?>" name="quesNo" required="">
				</td>

			</tr>

			<tr>
				<td>
					Question:
				</td>
				<td>
					<input type="text" name="ques" placeholder="Type Your Question" required="">
				</td>

			</tr>

            <tr><td style="color:blue;">Enter Your Options</td></tr>
			<tr>
				<tr><td></td></tr>
				<td>
					Option One
				</td>
				<td>
					<input type="text" name="option1" placeholder="Enter Your Option One" required="">
				</td>

			</tr>
			<tr>
				<td>
					Option Two
				</td>
				<td>
					<input type="text" name="option2" placeholder="Enter Your Option two " required="">
				</td>

			</tr>

			<tr>
				<td>
					Option Three
				</td>
				<td>
					<input type="text" name="option3" placeholder="Enter Your Option Three" required="">
				</td>

			</tr>
			<tr>
				<td>
					Option Four
				</td>
				<td>
					<input type="text" name="option4" placeholder="Enter Your Option Four" required="">
				</td>

			</tr>
			<tr>
				<td>
					Right Answer
				</td>
				<td>
					<input type="number" name="rightAns" placeholder="Enter Your Option Four" required="">
				</td>

			</tr>
			<tr>
				
				<td colspan="2" align="right" color="red">
					<input  type="submit" name="o" value="Submit To Add " required="">
				</td>

			</tr>




    </table>  		



  	</form>

  </div>


	
</div>
<?php include 'inc/footer.php'; ?>