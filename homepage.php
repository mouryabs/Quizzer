<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
 unset($_SESSION);
 session_destroy();
 header("location: index.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT name,imgURL FROM categories";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) 
{
     while($row = $result->fetch_assoc()) 
	{
     $topic[$i]=$row["name"];   
     $imgURL[$i]=$row["imgURL"];
     $i++;
    }
}
$conn->close();
?>

<html lang="en">
<head>
<title>Quiz like never before</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="materialize.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<scipt src="materialize.js" type="text/javascript"></scipt>
<style>
    body {
      font: 400 15px Lato, sans-serif;
      line-height: 1;
      //color: #818181;
	 background-color: #06283d;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #06283d;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #06283d; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color:#06283d;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #06283d !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;	
      animation-duration: 1s;	
      -webkit-animation-duration: 1s;
      visibility: visible;			
  }
  @keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }	
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
</style>
  </head>
  <body style="background:white">
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	<p class="navbar-brand" style="color:white"> Quiz Something </p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="addq.php">ADD Q's</a></li>
        <li><a href="scorecard.php">PROFILE</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
       </ul>
    </div>
  </div>
</nav>
<div class=" text-center w3-row" style="background:#06283d">
    <br/> <br/><br/>
  <h1 style="color:white">Categories</h1> 
</div>
<div class="w3-container w3-group" id="root">  
</div>

 </body>
     <script type="text/javascript">
  var categories = <?php echo json_encode($topic); ?>;    
  var imgURL = <?php echo json_encode($imgURL);?>;
  var rootTag = document.getElementById("root");
  var noCategories = categories.length;
  var noRows = 0;
  var count=0;
  if(noCategories>0)
      {
          //w3-row-padding w3-margin-top w3-padding-xlarge w3-animate-bottom
          noRows = Math.ceil(noCategories/3);
      }
  for( var i=0; i<noRows ;i++)
      {
          var row = document.createElement("div");
          row.classList.add("row");
          row.classList.add("w3-margin-top");
          //row.classList.add("w3-padding");
          row.classList.add("w3-animate-bottom");
          for(var j=0; j<6;j++)
              {
                  if(count<noCategories)  //add cards
                      {   //creating container for card
                          var container = document.createElement("div");
                          container.classList.add("col");
                          container.classList.add("s12");
                          container.classList.add("m4");
                          container.classList.add("l2");
                          //creating the card
                          var card = document.createElement("div");
                          card.classList.add("card");
                          card.classList.add("small");
                          card.classList.add("hoverable");
                          
                          // creating image space
                          var cardImage = document.createElement("div");
                          cardImage.classList.add("card-image");
                          var image = document.createElement("img");
                          image.setAttribute("src","pictures/"+imgURL[count]);
                          var span = document.createElement("span");
                          span.classList.add("card-title");
                          span.innerHTML=categories[count];
                          
                          cardImage.appendChild(image);
                          cardImage.appendChild(span);
                          
                          //creating card content
                          var desc = document.createElement("div");
                          desc.classList.add("card-content");
                          desc.innerHTML = "<p> Some description </p>";
                          
                          // creating action area
                          var action = document.createElement("div");
                          action.innerHTML= "<a href=\"play.php?game="+categories[count]+"\" class=\"waves-effect waves-teal btn-white \"> Click here to play! </a> "
                          action.classList.add("card-action");
                          //appending
                          card.appendChild(cardImage);
                          card.appendChild(desc);
                          card.appendChild(action);
                          container.appendChild(card);
                          row.appendChild(container);
                          count++;
                          
                      }
              }
          rootTag.appendChild(row);
          
      }
  </script>
 </html>