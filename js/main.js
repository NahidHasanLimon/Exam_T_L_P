$(function(){
//for user registration
	$("#regsubmit").click(function(){

	var name=$("#name").val();
	var username=$("#username").val();
	var password=$("#password").val();
	var email=$("#email").val();
	//dataString is simply a variable
	var dataString ='name='+name+'&username='+username+'&password='+password+'&email='+email;
	//ajax start
			$.ajax({
			//body of ajax

			type:"POST",
			url:"getregister.php",
			data:dataString,
			//operation
			success:function(data){
              
              $("#limon").html(data);//where to show

			
			}

          


			});
		
            return false;

	});

	//For User Login
	$("#login_submit").click(function(){

	 var email=$("#email").val();
	 var password=$("#password").val();
	
	//dataString is simply a variable
	var dataString ='email='+email+'&password='+password ;
	//ajax start
			$.ajax({
			//body of ajax

			type:"POST",
			url:"getlogin.php",
			data:dataString,
			//operation
			success: function(data){

              if($.trim(data) == "empty") {
//use #for id and dot(.) for class 
              		 $(".empty").show();

              		 setTimeout(function(){

              		 	$(".empty").fadeOut();
              		 },3000);
              		

              }
             
              else if($.trim(data) == "disable")
              {
                     $(".disable").show();
              	    setTimeout(function(){

              		 	$(".disable").fadeOut();
              		 },3000);
              		 

              }
              else if($.trim(data) == "error")
              {
              	      $(".error").show();
              	      setTimeout(function(){

              		 	 $(".error").fadeOut();
              		 },3000);
              		 

              }
              else
              	 {

              	 	window.location="exam.php";
              	 }
              

			
			}

          


			});
		
            return false;

	});




});