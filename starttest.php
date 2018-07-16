<?php include 'inc/header.php'; ?>
<?php 
Session::checkSession();//check logged in or out
$question=$exam->getQuestion();
$total=$exam->getTotalRows();
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
<h1>Welcome To Quizz</h1>
	<div class="starttest">
	<h2>All the Best</h2>

	<ul>
		<li> <strong>Number of Question:</strong><?php echo $total; ?></li>
		<li> <strong>Types of  Question:</strong> MCQ</li>
		


	</ul>
	

	
	<a href="test.php?q=<?php echo $question['quesNo']; ?>">Click For Test</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>