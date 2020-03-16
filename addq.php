<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['username'])) {
 unset($_SESSION);
 session_destroy();
 header("location: index.php");
}
$user=$_SESSION['username'];
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
     $i++;
    }
}

?>
<html lang="en">
<head>
<title>Quiz like never before</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="materialize.css">
    <link rel="stylesheet" type="text/css" class="ui" href="//oss.maxcdn.com/semantic-ui/2.1.8/components/statistic.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="jquery-2.2.2.min.js"></script>
    <link rel="stylesheet" href="UI-Dropdown-master/dropdown.css">
    <script src="highcharts/highcharts.js"></script>
    <script src="UI-Dropdown-master/dropdown.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="materialize.js"></script>
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
         <li><a href="homepage.php">PLAY</a></li>
         <li><a href="scorecard.php">PROFILE</a></li>
         <li><a href="logout.php">LOGOUT</a></li>
       </ul>
    </div>
  </div>
</nav>
<div class=" text-center w3-row" style="background:#06283d;">
    <br/> <br/><br/>
  <h1 style="color:white">Add Question</h1> 
</div>
      <div class="row" style="height:50px"></div>
      <div>
      <div class="row">
          <div class="col l8 offset-l2 m10 offset-m1">
           <div class="card z-depth-2" style="padding-top:30px">
            <div class="row">
                <div class="input-field col l6 offset-l3 m6 offset-m3">
                <select id="selectbox">
                   <option value="" disabled selected>Categories</option>
                </select>
               <label>Select Category</label>
              </div>
              <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Question" name="question" type="text" class="validate">
             <label for="question">Enter Question</label>
             </div>
            </div>
               <div class="row">
                 <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Option 1" name="option1" type="text" class="validate">
             <label for="option1">Option 1</label>
             </div>
               </div>
              <div class="row">
             <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Option 2" name="option2" type="text" class="validate">
             <label for="option2">Option 2</label>
             </div>
               </div>
                              <div class="row">
                 <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Option 3" name="option3" type="text" class="validate">
             <label for="option3">Option 3</label>
             </div>
               </div>
                              <div class="row">
                 <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Option 4" name="option4" type="text" class="validate">
             <label for="option4">Option 4</label>
             </div>
               </div>
             <div class="row">
              <div class="input-field col l6 m6 offset-l3 offset-m3">
             <input placeholder="Answer" name="answer" type="text" class="validate">
             <label for="answer">Answer</label>
             </div>
               </div>
               <div class="row" style="padding-bottom:10px">
                   <div class="col m6 l6 offset-l3 offset-m3">
               <button type="button" value="submit" class="btn btn-primary btn-block" name="submit" onclick="validate()" style="background:#337ab7">Submit</button>
               </div>
          </div>
           </div>
          </div>
      </div> 
      </div>
      <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <p id="status"></p>
    </div>
  </div>
    </body>
    <script type="text/javascript">
    var topics = <?php echo json_encode($topic) ?>;
    var selectbox = document.getElementById("selectbox");
             $(document).ready(function() {
         $('select').material_select();
      });
        for(i=0;i<topics.length;i++)
            {
                var option = document.createElement("option");
                option.setAttribute("value",topics[i]);
                option.innerHTML=topics[i];
                selectbox.appendChild(option);
            }
        function validate()
        {
            var o1 = document.getElementsByName("option1")[0].value;
            var o2 = document.getElementsByName("option2")[0].value;
            var o3 = document.getElementsByName("option3")[0].value;
            var o4 = document.getElementsByName("option4")[0].value;
            var answer = document.getElementsByName("answer")[0].value;
            var flag= new Boolean(1);
            var cat  = document.getElementById("selectbox").value;
            if(cat=="")
                {
                    alert("Select Category");
                    flag=0;
                }
            //alert(o1);
            var question = document.getElementsByName("question")[0].value;
            var questionBundle = {"question":question,"option1":o1,"option2":o2,"option3":o3,"option4":o4,"answer":answer,"catName":cat};
            ajaxCall(questionBundle);
            
        }
        
        function ajaxCall(bundle)
        {
           var valid_link = "http://localhost/QuizWebsite/insert.php";
           var ajaxObj = new XMLHttpRequest(); 
           var data =bundle;
           ajaxObj.open("POST",valid_link,true);
           ajaxObj.send(JSON.stringify(data));
            ajaxObj.onreadystatechange = function()
            {
                if(ajaxObj.readyState == 4)
                    {
                        var jsonObj = JSON.parse(ajaxObj.responseText);
                        if(jsonObj)
                            {
                                $('#modal1').openModal();
                                var status=document.getElementById("status");
                                status.innerHTML="QUESTION SENT FOR VERIFICATION";
                                status.style.color="white";
                                status.parentElement.style.backgroundColor="#43A047";
                            }
                        else
                            {
                                $('#modal1').openModal();
                                status=document.getElementById("status");
                                status.innerHTML="QUESTION HAD NO MATCHING ANSWER!";
                                status.style.color="white";
                                status.parentElement.style.backgroundColor="#f44336";
                            }
                    }
            }
        }
    </script>
</html>