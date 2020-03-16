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
  $question= $data->question;
  $catName = $data->catName;
  $option1 = $data->option1;
  $option2 = $data->option2;
  $option3 = $data->option3;
  $option4 = $data->option4;
  $answer=$data->answer;
  if(strcmp($answer,$option1)==0||strcmp($answer,$option2)==0 || strcmp($answer,$option3)==0|| strcmp($answer,$option4)==0)
  {
      $valid=true;
      $sql="INSERT INTO addquestion VALUES ('$catName','$question','$option1','$option2','$option3','$option4','$answer')";
      $result=$conn->query($sql);
  }
    else
    {
        $valid=false;
    }
  
  echo json_encode($valid);
}
?>