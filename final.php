<?php include 'inc/header.php'; ?>
<?php 
Session::checkSession();//check logged in or out

Session::checkExam_Process();
 Session::set("Exam",true);
 ?> 
 <style type="text/css">
 	
.starttest{width: 590px; padding:20px;margin:0 auto; border: 1 px solid #ddd;}
.starttest{} h2{}
.starttest{}  ul{}
.starttest{}  ul li{}
.starttest{} a{display: block;margin-top: 10px;
border: 1px solid #ddd;background: #f4f4f4;text-decoration: none;padding: 6px 10px;text-align: center;
}
 </style>
<div class="main">
  <h1>Exam Finished !!</h1>
  <div class="starttest">
  <p>Congratulation.</p>
  
  <p>Total Question:<?php if (isset($_SESSION['score'])) {
  	$total=$exam->getTotalRows();
  	echo $total;
  
  	
  } ?></p>
  <p>Final Score:

  <?php if (isset($_SESSION['score'])) {
  	echo $_SESSION['score'];
  	
  	
  } ?>
  </p>
  <p>Wrong Answer: <?php if (isset($_SESSION['score'])) {
  	$total=$exam->getTotalRows();
  	$result=$total-$_SESSION['score'];
  	echo $result;
    unset($_SESSION['score']);
  	
  } ?></p>
  

  <a href="viewAns.php"> View Answer</a>
  <a href="starttest.php">Start Again</a>
  </div>
</div>
<?php include 'inc/footer.php'; ?>