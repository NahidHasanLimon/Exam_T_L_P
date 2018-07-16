<?php include 'inc/header.php'; ?>
<?php 
Session::checkExam();
Session::checkSession();//check logged in or out

 $total=$exam->getTotalRows();


  ?>
<div class="main">
<h1> Questions With Answer <?php echo $total; ?> </h1>
	<div class="test">
		
		<table> 
			<?php 
			$getQues=$exam->getAllQuestion_BY_ORDER(); 
			while ($question=$getQues->fetch_assoc()) {
					
				


			?>
			<tr>
				<td colspan="2">
				 <h3> Ques <?php echo $question['quesNo']; ?> : <?php echo $question['ques']; ?></h3>
				</td>
			</tr>

			<?php  
			$number=$question['quesNo'];

			$answer=$exam->getAnswer($number);
			if ($answer) {
				while($result=$answer->fetch_assoc()) {
					
					
			

			?>


			<tr>
				<td>
					<input type="radio"/>
					<?php 
					if ($result['rightAns']=='1') {
						echo "<span style='color:blue'>".$result['ans']."</span>";
					}
					else 
					{
						echo $result['ans'];
					}


					  ?>
				 
				</td>
			</tr>
			<?php }  ?>
			<?php } } ?>
			
			
		</table>


</div>
 </div>
<?php include 'inc/footer.php'; ?>