<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['username'])) {
 unset($_SESSION);
 session_destroy();
 header("location: index.php");
}
$user = $_SESSION['username'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";
$pic = $_SESSION['pic'];
$user = $_SESSION['username'];
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
         <li><a href="addq.php">ADD Q's</a></li>
        <li><a href="homepage.php">PLAY</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
       </ul>
    </div>
  </div>
</nav>
<div class=" text-center w3-row" style="background:#06283d;">
    <br/> <br/><br/>
  <h1 style="color:white">Scorecard</h1> 
</div>
      <div class="row" style="height:50px"></div>
      <div class="row">
      <div class="col l3">
          <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="users/<?php echo $pic ?>" style="height:300px">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4"><?php echo $_SESSION['username']?><i class="material-icons right">more_vert</i></span>
      <p><a href="#"></a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
      </div>
          <div class="col l9">
           <div class="card" style="padding-top:30px">
            <div class="row">
                <div class="input-field col l6 offset-l3">
                <select id="selectbox" onchange="ajaxCall(this.value)">
                   <option value="" disabled selected>Categories</option>
                </select>
               <label>Select Category</label>
              </div>
            </div>
               <div class="row">
               <div class="col l6" id="user">
               </div>
                <div class="col l6" id="everyone">
                </div>
               </div>
               <div class="row" style="visibility:hidden" id="statbar">
               <div class="col l2 offset-l3">
                <div class="ui statistic">
                <div class="value" id="userval">
                  0
                </div>
               <div class="label">
                Games
               </div>
               </div>   
               </div>
                <div class="col l2 offset-l4">
                <div class="ui statistic">
                <div class="value" id="allval">
                  0
                </div>
               <div class="label">
                Games
               </div>
               </div>   
               </div>
               </div>
           </div>
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
       function ajaxCall(option)
        {
           var valid_link = "http://localhost/QuizWebsite/getscore.php";
           var ajaxObj = new XMLHttpRequest(); 
            var username="<?php echo $_SESSION['username']?>";
           var data ={"user":username,"game":option};
            ajaxObj.open("POST",valid_link,true);
           ajaxObj.send(JSON.stringify(data));
            ajaxObj.onreadystatechange = function()
            {
                if(ajaxObj.readyState == 4)
                    {
                        var jsonObj = JSON.parse(ajaxObj.responseText);
                        drawChart(jsonObj.correct,jsonObj.totalq,"user");
                        drawChart(jsonObj.allcorrect,jsonObj.alltotal,"everyone");
                    }
            }
            
        }
        function drawChart(correct,total,target)
        {
            var statbar = document.getElementById("statbar");
            statbar.style.visibility="visible";    
            var userval = document.getElementById("userval");
            var allval = document.getElementById("allval");
            var incorrect = total-correct;
            var correctDeg = (correct/total)*360;
            var incorrectDeg = (incorrect/total)*360;
            var title="";
            if(target=="everyone")
                {
                    title="Everyone";
                    allval.innerHTML=correct;
                }
            else{
                title="Me";
                userval.innerHTML=correct;
            }
            var charts = new Highcharts.Chart({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                renderTo: target
            },
            title: {
                text: title
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Answers',
                colorByPoint: true,
                data: [{
                    name: 'Correct',
                    y: correctDeg,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Wrong',
                    y: incorrectDeg
                }]
            }]
        });
        }
    </script>
</html>