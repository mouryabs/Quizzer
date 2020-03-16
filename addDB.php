<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";
$valid=false;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));
  $question= strip_tags($data->q);
  $catName = strip_tags($data->catName);
  $option1 = strip_tags($data->o1);
  $option2 = strip_tags($data->o2);
  $option3 = strip_tags($data->o3);
  $option4 = strip_tags($data->o4);
  $answer=$data->ans;
  $question= substr($question,3);
  $answer = substr($answer,7);
  $catName = substr($catName,9);
  $type=$data->type;
    if($type=="verified"){
      $valid=true;
      $sql="INSERT INTO factbased VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$catName')";
      $result=$conn->query($sql);
      $sql="DELETE FROM addquestion WHERE question='$question'";
       $result=$conn->query($sql);
    }
    else
    {
       $sql="DELETE FROM addquestion WHERE question='$question'";
       $result=$conn->query($sql);
    }
  
  echo json_encode($valid);
}
?>