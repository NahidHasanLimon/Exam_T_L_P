<?php
 $filepath = realpath(dirname(__FILE__));
	
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
class exam
{

 private $db;
 private $fm;

public function __construct()
   {
 $this->db = new Database();
 $this->fm = new Format();


   }
   

   public function addQuestion($data)
  {
     
      $quesNo= mysqli_real_escape_string($this->db->link,$data['quesNo']);
      $ques=mysqli_real_escape_string($this->db->link,$data['ques']);


        $ans_array =array();
        $ans_array[1]=$data['option1'];
        $ans_array[2]=$data['option2'];
        $ans_array[3]=$data['option3'];
        $ans_array[4]=$data['option4'];
        //$rightAns2=$data['rightAns'];
        
         $rightAnswer=mysqli_real_escape_string($this->db->link,$data['rightAns']);
         $insert_ques_query="INSERT INTO tbl_ques(quesNo, ques) VALUES ('$quesNo','$ques')";
         $insert_ques=$this->db->insert($insert_ques_query);


       if ($insert_ques) {
           foreach ($ans_array as $key=> $options) {
             if ($options!='') {
               if ($rightAnswer==$key) {
                 $insert_options_Query="INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES ('$quesNo','1',
                 '$options')";
               }
               else
               {
                 $insert_options_Query="INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES ('$quesNo','0',
                 '$options')";
               }
                $insert_options_Query=$this->db->insert($insert_options_Query);
                if ($insert_ques) {
                  continue;
                }
                else
                {
                  die('Error');
                }
             }
           }

           $msg="<span class='success'>Successfully Question Added</span>";


       }
       
       return $msg;

       }
      
  

  
  function getAllQuestion_BY_ORDER()
  {
     $query= "SELECT * FROM tbl_ques ORDER BY quesNo  ASC ";
     $result=$this->db->select($query);
     return $result;
  }

  function deleteQuestion($quesNo)
  {
    $tables=array("tbl_ques","tbl_ans");
    foreach ($tables as  $table) {
      $query="DELETE  FROM $table WHERE quesNo='$quesNo' ";
     $delData=$this->db->delete($query);
    }

    if($delData)
    {
     $msg= "<span class= 'success'> Question Data Delete Successfully </span>";
    return $msg;
    }
     else 
     {
      {
     $msg="<span class='error'> Question Data Delete UnSuccessfull</span>";
    return $msg;
    }
    
     }

  }
  public function getTotalRows()
  {
    $query="SELECT * FROM tbl_ques";
    $getResult=$this->db->select($query);
    $total=$getResult->num_rows;
    return $total;

  }
  //Used To create Test
 // getQuestion
  public function getQuestion()
   {
     $query="SELECT quesNo FROM tbl_ques";
    $getdata=$this->db->select($query);
    $result=$getdata->fetch_assoc();
    return $result;

   }
   public function getQuesByNumber($qnumber)
   {

    $query="SELECT * FROM tbl_ques WHERE quesNo='$qnumber'";
    $getQuestion=$this->db->select($query);
    $result=$getQuestion->fetch_assoc();
    return $result;

   }
 public function getAnswer($qnumber){
   $query="SELECT * FROM tbl_ans WHERE quesNo='$qnumber'";
    $getAnswer=$this->db->select($query);
   


    return $getAnswer;
 }
 
  

}



?>