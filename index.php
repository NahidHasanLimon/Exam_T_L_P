<?php include 'inc/header.php'; ?>

<?php 
Session::checkLogin();//check logged in or out
 ?> 

<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" id="email" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" id="password" type="password" required=""></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" id="login_submit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="disable"  style="display: none">Disabled Account!! Warning!!</span>
	   <span class="empty" style="display: none ">Field Must not be Empty</span>
	   <span class="error"  style="display: none">Email or password  don not matched</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>