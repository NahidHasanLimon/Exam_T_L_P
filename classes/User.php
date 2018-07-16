<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

  
class User
{

 private $db;
 private $fm;

public function __construct()
   {
 $this->db = new Database();
 $this->fm = new Format();
 


   }




   public function addAdmin($data)
   {

       $adminName= mysqli_real_escape_string($this->db->link,$data['adminName']);
      $adminUser=mysqli_real_escape_string($this->db->link,$data['adminUser']);
      $adminPass=mysqli_real_escape_string($this->db->link,$data['adminPass']);
       $insert_admin_query="INSERT INTO tbl_admin(adminName,adminUser,adminPass,adminId) VALUES ('$adminName','$adminUser','$adminPass','')";
            $checkQuery_admin_USerName="SELECT * FROM tbl_admin WHERE adminUser='$adminUser'";
           
          
               $checkResult_Admin=$this->db->select($checkQuery_admin_USerName);
               
               if($checkResult_Admin!=false)
               {
                $msg="<span class='error'>Username Address Allready Exist</span>";
                return $msg;
                exit();
               }
              
          else
          {

                    
                $insert_admin_query_Result=$this->db->insert($insert_admin_query);
              if ($insert_admin_query_Result)
              {
              
                $msg="<span class='success'>Successfully!!Admin Added</span>";
                return $msg;
   
          }
          else 
          {
                       $msg= "<span class='error'> Admin can not be added</span>";
                        return $msg;

          }
          

      

   }
   
  
 }



    public function user_Registration($name,$username,$password,$email)
   {
   	  $name= $this->fm->validation($name);
   	  $username= $this->fm->validation($username);
   	  $password= $this->fm->validation($password);
   	  $email= $this->fm->validation($email);

   	
   	  $name= mysqli_real_escape_string($this->db->link,$name);
   	  $username=mysqli_real_escape_string($this->db->link,$username);
   	  
   	  $email=mysqli_real_escape_string($this->db->link,$email);
    
    if ($name == "" || $username =="" || $password == "" || $email =="" || $password == "") {
    	echo "<span class='error'> Filled Must Not be Empty</span>";
    	echo "Tamim";
    	exit();
    }
    else if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
    	  echo "Hasan";
    	 echo "<span class='error'> Invalid Email Address</span>";
    	 exit();
    }
   
   else
   {
   $checkQueryEmail="SELECT * FROM tbl_user WHERE email='$email'";
   $checkResultEmail=$this->db->select($checkQueryEmail);
	   if($checkResultEmail!=false)
	   {
	   	echo "<span class='error'>Email Address Allready Exist</span>";
	   	exit();
	   }
	   else {
      $password=mysqli_real_escape_string($this->db->link, md5($password));
	   	  $insert_user_query="INSERT INTO tbl_user(name,username,password,email) VALUES ('$name','$username','$password','$email')";
        
          $inserted_user_result=$this->db->insert($insert_user_query);
          if ($inserted_user_result) {
          		echo "<span class='success'>Registered Successfully</span>";
	   	exit();
          }
          else
          	 {
          	 	echo "<span class='success'>Unsuccessfull! Not Registered</span>";
          	 	exit();
          	 }
	   }


   }
  

   }
   public function user_login($email,$password)
   {
      $password= $this->fm->validation($password);
      $email= $this->fm->validation($email);

      
      $email=mysqli_real_escape_string($this->db->link,$email);

        if($email =="" || $password == "") {
      //echo "<span class='error'> Filled Must Not be Empty</span>";
          echo "empty";
          exit();
    }

    
   else
   {       $password=mysqli_real_escape_string($this->db->link, md5($password));
          $loginQuery="SELECT * FROM tbl_user WHERE email='$email' AND password='$password' ";
           $result= $this->db->select($loginQuery);

           if ($result !=false) {

             $login_value=$result->fetch_assoc();

             if($login_value['status']=='1') {
               //echo "Your Accound Has been Disabled...Contact With Admin.....";
              echo "disable";
              exit();
             }
         else
         {
          Session::init();
          Session::set("login",true);
          Session::set("userid",$login_value['userid']);
          Session::set("username",$login_value['username']);
          Session::set("name",$login_value['name']);
          Session::set("email",$login_value['email']);
          header("Location:index.php");

         }
       }
                 else {
                  echo "error";
                  exit();


                 }

           }

   }

   
   public function getAdminData($data)
   {
   	  $adminUser= $this->fm->validation($data['adminUser']);
   	  $adminPass= $this->fm->validation($data['adminPass']);
   	  $adminUser= mysqli_real_escape_string($this->db->link,$adminUser);
   	  $adminPass=mysqli_real_escape_string($this->db->link,($adminPass));

   }
   public function getUserData($userid)//Making USer Profiel
   {
    
       $query="SELECT * FROM  tbl_user WHERE userid='$userid'";
      $result= $this->db->select($query);
       return $result;
   }

   public function getAllUser()
   {
   $query="SELECT * FROM  tbl_user";
   $result= $this->db->select($query);
    return $result;

   }
   //For Update User Profile
   public function UpdateUserData($userid,$data)
   {
      $name= $this->fm->validation($data['name']);
     $username= $this->fm->validation($data['username']);
      $email= $this->fm->validation($data['email']);
   
     

    
      $name= mysqli_real_escape_string($this->db->link,$name);
      $username=mysqli_real_escape_string($this->db->link,$username);
      $email=mysqli_real_escape_string($this->db->link,$email);

      $query="UPDATE tbl_user SET 
      name='$name',
      username='$username',
      email= '$email'
        WHERE userid = '$userid'";

     $update_row= $this->db->update($query);
     if($update_row)
     {
     $msg =  "<span class='success'>Profile Updated Successfully</span> ";
     return $msg;

     }
     else 
     {
     $msg=  "<span class='error'>Not Updated</span>";
     return $msg;

     }




   }
   //For Admin Pannel
   public function DisableUser($userid)
   {
     $query="UPDATE tbl_user SET status='1' WHERE userid= '$userid' ";

     $update_row= $this->db->update($query);
     if($update_row)
     {
	   $msg =  "<span class='success'>User Status Inactivated </span> ";
	   return $msg;

     }
     else 
     {
     $msg=  "<span class='error'>User Status Activated</span>";
	   return $msg;

     }



   }
   public function EnableUser($userid)
   {
     $query="UPDATE tbl_user SET status='0' WHERE userid= '$userid' ";

     $update_row= $this->db->update($query);
     if($update_row)
     {
	   $msg =  "<span class='success'>User Status Activated </span> ";
	   return $msg;

     }
     else 
     {
     $msg=  "<span class='error'>User Status InActivated</span>";
	   return $msg;

     }



   }

    public function DeleteUser($userid)
   {
     $query="DELETE FROM tbl_user WHERE userid= '$userid' ";

     $del_data= $this->db->delete($query);
     if($del_data)
     {
	   $msg =  "<span class='success'>User Deleted successfully  </span> ";
	   return $msg;

     }
     else 
     {
     $msg=  "<span class='error'>User can not be deleted </span>";
	   return $msg;

     }



   }

}



?>