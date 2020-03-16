<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));
  $user = $data->user;
  $game = $data->game;

  
  $sql = "SELECT totalquestions,correct,points FROM scorecard WHERE username='$user' AND catName='$game' ";
  $result = $conn->query($sql);
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        $correct = $row['correct'];
        $totalq =  $row['totalquestions'];
    }
    else
    {
        $correct=0;
        $totalq=0;
    }
    $sql = "SELECT SUM(totalquestions) AS alltotal , SUM(correct) AS allcorrect FROM scorecard WHERE catName='$game'";
    $result=$conn->query($sql);
    if($result->num_rows)
    {
        $row = $result->fetch_assoc();
        $allcorrect=  $row['allcorrect'];
        $alltotal = $row['alltotal'];
    }
    else
    {
        $allcorrect=0;
        $alltotal=0;
    }
   $str = array('totalq'=>$totalq, 'correct'=>$correct,'allcorrect'=>$allcorrect,'alltotal'=>$alltotal);
    echo json_encode($str);
}
?>