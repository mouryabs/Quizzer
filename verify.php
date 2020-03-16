<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
if (!isset($_SESSION['admin'])) {
 unset($_SESSION);
 session_destroy();
 header("location: index.php");
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM addquestion";
$result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) 
{
     while($row = $result->fetch_assoc()) 
	{
     $questions[$i]=$row["question"];   
     $option1[$i]=$row["option1"];
     $option2[$i]=$row["option2"];
     $option3[$i]=$row["option3"];
     $option4[$i]=$row["option4"];
     $answers[$i]=$row["answer"];
     $categories[$i]=$row['catName'];
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
        <li><a href="logout.php">Logout</a></li>
       </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center w3-row" style="height:200px">
  <h1>Verify</h1> 
</div>
<div class="container row">
    
    <div class="col l6 offset-l3 m8 offset-m1">
    <ul id="root"></ul>
    </div>
</div>
<div id="warning">
<div class="container row">
   <div class="col l8 m8 offset-l2 offset-m2 s12" id="warn">
       <div class="row">
       <div class="col l6 offset-l4 m6 offset-m3">
           <img src="warn.png"/>
       </div>
       </div>
    </div> 
</div>
<div class="container row">
   <div class="col l8 m8 offset-l2 offset-m2 s12" id="warn">
       <div class="row">
       <div class="col l6 offset-l3 m6 offset-m3">
           <p class="flow-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No Questions, Come Back Later!</p>
       </div>
       </div>
    </div> 
</div>
      </div>
  <script type="text/javascript">
    var questions = <?php echo json_encode($questions) ;?>;
    var answers = <?php echo json_encode($answers) ;?>;
    var noOfQuestions = questions.length;
    var option1 = <?php echo json_encode($option1);?>;
    var option2 = <?php echo json_encode($option2);?>;
    var option3 = <?php echo json_encode($option3);?>;
    var option4 = <?php echo json_encode($option4);?>;
    var rootTag = document.getElementById("root");
    var categories = <?php echo json_encode($categories);?>;
    if(noOfQuestions)
        {
           var warn = document.getElementById("warning");
           var par = warn.parentElement().removeChild(warn);
        }
    for(i=0;i<noOfQuestions;i++)
        {
            var listEle = document.createElement("li");
            listEle.setAttribute("data-flip-title",i+1);
            
            var divEle = document.createElement("div");
            divEle.classList.add("card");
            divEle.classList.add("z-depth-5");
            divEle.classList.add("container");
            divEle.style.height = "350px";
            divEle.style.width= "650px";
            divEle.setAttribute("name",i);
            
            /* adding question */
            var question = document.createElement("p");
            question.innerHTML = "Q. "+questions[i];
            question.classList.add("flow-text");
            question.classList.add("center");
            question.style.height="125px";
            question.setAttribute("name",i)
            
            /*adding answer*/
            var addanswer = document.createElement("p");
            addanswer.innerHTML="Answer:"+answers[i];
            addanswer.classList.add("flow-text");
            addanswer.setAttribute("name",i);
            
            /*add category */
            var cat = document.createElement("p");
            cat.innerHTML="Category:"+categories[i];
            cat.classList.add("flow-text");
            cat.setAttribute("name",i);
            
            /* creating row one */
            var row1 = document.createElement("div");
            row1.classList.add("row");
            row1.classList.add("center");
            
            var col1 = document.createElement("div");
            col1.classList.add("col");
            col1.classList.add("l5");
            var label1 = document.createElement("label");
            label1.setAttribute("for","1"+i);
            label1.setAttribute("name",i);
            label1.innerHTML = "<h6>"+option1[i]+"</h6>";
            col1.appendChild(label1);
            
            var col2 = document.createElement("div");
            col2.classList.add("col");
            col2.classList.add("l5");
            var opt2 = document.createElement("input");
            var label2 = document.createElement("label");
            label2.setAttribute("for","2"+i);
            label2.setAttribute("name",i);
            label2.innerHTML = "<h6>"+option2[i]+"</h6>";
            col2.appendChild(label2);
            
            row1.appendChild(col1);
            row1.appendChild(col2);
            
            /* add row one to card */
            divEle.appendChild(row1);
            
            /* creating row two */
            var row2 = document.createElement("div");
            row2.classList.add("row");
            row2.classList.add("center");
            
            var col3 = document.createElement("div");
            col3.classList.add("col");
            col3.classList.add("l5");
            var label3 = document.createElement("label");
            label3.setAttribute("for","3"+i);
            label3.setAttribute("name",i);
            label3.innerHTML = "<h6>"+option3[i]+"</h6>";
            col3.appendChild(label3);
            
            var col4 = document.createElement("div");
            col4.classList.add("col");
            col4.classList.add("l5");
            var label4 = document.createElement("label");
            label4.setAttribute("for","4"+i);
            label4.setAttribute("name",i);
            label4.innerHTML = "<h6>"+option4[i]+"</h6>";
            col4.appendChild(label4);
            
            row2.appendChild(col3);
            row2.appendChild(col4);
            
            /* Creating form  */
            var form = document.createElement("form");
            form.setAttribute("action","");
            form.setAttribute("id","form"+i);
            form.appendChild(row1);
            form.appendChild(row2);
            
            var row3 = document.createElement("div");
            row3.classList.add("row");
            var colbut = document.createElement("div");
            colbut.classList.add("col");
            colbut.classList.add("l2");
            colbut.innerHTML="<a class=\"waves-effect waves-light orange btn\" onclick=\"ajaxCall('wrong',this)\" name=\""+i+"\">Wrong</a>";
            var colnext = document.createElement("div");
            colnext.classList.add("col");
            colnext.classList.add("l2");
            colnext.classList.add("offset-l7");
            if(i<1){
              colnext.innerHTML="<a class=\"waves-effect waves-light green btn\" onclick=\"ajaxCall('verified',this)\" name=\""+i+"\">Verify</a>";}
            else{
                colnext.innerHTML="<a class=\"waves-effect waves-light green btn\" onclick=\"ajaxCall('verified',this)\" name=\""+i+"\">Verify</a>";}
            row3.appendChild(colbut);
            row3.appendChild(colnext);
            
            
            /*adding rows to card */
            divEle.appendChild(question);
            divEle.appendChild(addanswer);
            divEle.appendChild(cat);
            divEle.appendChild(form);
            divEle.appendChild(row3);
            listEle.appendChild(divEle);
            rootTag.appendChild(listEle);
        }
  </script>
  </body>
    <script>
          function ajaxCall(type,nameVal)
      {
          var parent = document.getElementsByName(nameVal.name);
          var q = parent[1].innerHTML;
          var c = parent[3].innerHTML;
          var ans = parent[2].innerHTML;
          var o1 = parent[4].innerHTML;
          var o2 = parent[5].innerHTML;
          var o3 = parent[6].innerHTML;
          var o4 = parent[7].innerHTML;
          var bundle={"q":q,"ans":ans,"o1":o1,"o2":o2,"o3":o3,"o4":o4,"type":type,"catName":c};            
          var valid_link = "http://localhost/QuizWebsite/addDB.php";
           var ajaxObj = new XMLHttpRequest(); 
           var data =bundle;
            ajaxObj.open("POST",valid_link,true);
           ajaxObj.send(JSON.stringify(data));
            ajaxObj.onreadystatechange = function()
            {
                if(ajaxObj.readyState == 4)
                    {
                        var jsonObj = JSON.parse(ajaxObj.responseText);
                        var remove = parent[0].parentElement;
                        remove.removeChild(parent[0]);
                            
                    }
            }
      }
    </script>
</html>