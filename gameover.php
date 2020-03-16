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
  $conn->query($sql);
  $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $score = $row['points']+$data->score ;
    $correct = $row['correct']+$data->correct;
    $totalq = $row['totalquestions']+10;
    $sql2 = "UPDATE scorecard SET totalquestions='$totalq', correct='$correct', points='$score' WHERE username='$user' AND catName='$game'";
    $conn->query($sql2);
}
else
{
    $sql2 = "INSERT INTO scorecard VALUES('$user','$game',10,'$data->correct','$data->score')" ;
    $conn->query($sql2);
}
  echo json_encode($data->game);
}
?>