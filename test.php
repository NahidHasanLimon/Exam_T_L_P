<?php include 'inc/header.php'; ?>
<?php 
Session::checkSession();//check logged in or out
if (isset($_GET['q'])) {
	echo $_GET['q'];
	
	$number=(int) $_GET['q'];
	$total=$exam->getTotalRows();
	if ($number==$total) {
		Session::set("exam_process",true);
	}
	
}
else
{
	header("Location:exam.php");

}
$total=$exam->getTotalRows();
$question=$exam->getQuesByNumber($number);

 ?> 
 <?php if($_SERVER['REQUEST_METHOD']=='POST'){

   $process=$pro->processData($_POST);


 }


  ?>
<div class="main">
<h1>Question <?php echo $question['quesNo']; ?> out of <?php echo $total; ?> </h1>
	<div class="test">
		<form method="POST" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3> Q.No<?php echo $question['quesNo']; ?>  <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
			<?php  
			$answer=$exam->getAnswer($number);
			if ($answer) {
				while ($result=$answer->fetch_assoc()) {
					
			

			?>

			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']; ?> required="" />
				 <?php echo $result['ans']; ?>" 
				</td>
			</tr>
			<?php } } ?>
			<tr>
			  <td>
				<input type="submit" id="submit_button" name="submit" value="Next Question"  />
				<input type="hidden" name="number" value="<?php echo $number; ?>"/>
			</td>
			</tr>
			
		</table>
	</form>

</div>
 </div>
<?php include 'inc/footer.php'; ?>