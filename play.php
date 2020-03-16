<html lang="en">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";
$game="";
$user="";
session_start();
if (!isset($_SESSION['username'])) {
 unset($_SESSION);
 session_destroy();
 header("location: index.php");
}
$user = $_SESSION['username'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    if(isset($_GET['game']))
    {
        $game=$_GET['game'];
    }
$sql = "SELECT question,option1,option2,option3,option4,answer from factbased where name='$game' ORDER BY RAND() LIMIT 10";
    $result = $conn->query($sql);
$i=0;
if ($result->num_rows > 0) 
{
     while($row = $result->fetch_assoc()) 
	{
     $questions[$i] = $row["question"];
     $answers[$i] = $row["answer"];
     $option1[$i] = $row["option1"];
     $option2[$i] = $row["option2"];
     $option3[$i] = $row["option3"];
     $option4[$i] = $row["option4"];
     $questions[$i]= preg_replace("/\r?\n/", "\\n", addslashes($questions[$i])); 
     $answers[$i]= preg_replace("/\r?\n/", "\\n", addslashes($answers[$i]));
     $option1[$i]= preg_replace("/\r?\n/", "\\n", addslashes($option1[$i])); 
     $option2[$i]=preg_replace("/\r?\n/", "\\n", addslashes($option2[$i])); 
     $option3[$i]=preg_replace("/\r?\n/", "\\n", addslashes($option3[$i])); 
     $option4[$i]=preg_replace("/\r?\n/", "\\n", addslashes($option4[$i])); 
     $i++;
    }
}
$sql = "SELECT totalquestions,correct,points FROM scorecard WHERE username='$user' AND catName='$game' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    $score = $row['points'] ;
    $correct = $row['correct'];
    $totalq = $row['totalquestions'];
}
    else
    {
        $score = 0 ;
        $correct = 0;
        $totalq = 0;
    }
    $sql = "SELECT SUM(totalquestions) AS totalq ,SUM(correct) AS totalc,points FROM scorecard WHERE catName='$game' ";
    $result= $conn->query($sql);
    if($result->num_rows>0)
    {
        $row = $result->fetch_assoc();
        $ecorrect = $row['totalc'];
        $etotalq = $row['totalq'];
    }
?>
<head>

  <title>Quiz like never before</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" class="ui" href="//oss.maxcdn.com/semantic-ui/2.1.8/components/statistic.min.css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" type="text/css" href="flipclock/flipclock.css">
  <script src="jquery-2.2.2.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="highcharts/highcharts.js"></script>
  <script src="flipclock/flipclock.min.js"></script>
    <link rel="stylesheet" href="flipster/jquery.flipster.min.css">
	<!--<script src="flipster/jquery.min.js"></script>-->
    <script src="flipster/jquery.flipster.min.js"></script>
    <script src="materialize.js"></script>
    <link rel="stylesheet" href="materialize.css">
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
  <body style="background-image: url('cover/<?php echo $game ?>.jpg');width:100%;" id="body"> 
      <!--
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
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#contact">CONTACT</a></li>
       </ul>
    </div>
  </div>
</nav> -->
      <!--
<div class="jumbotron text-center w3-row" style="background-image: url('cover/food.jpg');width:100%; height: 300px">
  <h1><?php if(isset($_GET['game'])){ echo $_GET['game'];} ?></h1> 
</div> -->
<div class="row" style="height:190px" id="spare"><div class="col l3 offset-l5 clock" id="myclock"></div></div>
<div  id="questions" style="height: 700px">
<ul id="root">
    <!-- questions added here -->
</ul>
</div>
<script>
    var wheel;
    var isQuiz =false;
    var clock = $('.clock').FlipClock(300, {
		clockFace: 'MinuteCounter',
        countdown: true,
        stop: function(){
            endQuiz();
        }
	});
    isQuiz = true;
   
    window.onblur = function(){
        if(isQuiz){
        alert("You have changed tab!!");
        endQuiz();
        }
    }
    var questions = <?php echo json_encode($questions) ;?>;
    var answers = <?php echo json_encode($answers) ;?>;
    var noOfQuestions = questions.length;
    var option1 = <?php echo json_encode($option1);?>;
    var option2 = <?php echo json_encode($option2);?>;
    var option3 = <?php echo json_encode($option3);?>;
    var option4 = <?php echo json_encode($option4);?>;
    var allscore =<?php echo json_encode($score);?>;
    var totalq = <?php echo json_encode($totalq);?>;
    var usrcorrect =<?php echo json_encode($correct);?>;
    var etotalq = <?php echo json_encode($etotalq);?>;
    var ecorrect = <?php echo json_encode($ecorrect);?>;
    var rootTag = document.getElementById("root");
    for(i=0;i<noOfQuestions;i++)
        {
            var listEle = document.createElement("li");
            listEle.setAttribute("data-flip-title",i+1);
            
            var divEle = document.createElement("div");
            divEle.classList.add("card");
            divEle.classList.add("z-depth-5");
            divEle.classList.add("container");
            divEle.style.height = "450px";
            divEle.style.width= "650px";
            
            /* adding question */
            var question = document.createElement("p");
            question.innerHTML = questions[i]+"<br/>"+"<br/>"+"<br/>";
            question.classList.add("flow-text");
            question.classList.add("center");
            question.style.height="200px";
            
            /* creating row one */
            var row1 = document.createElement("div");
            row1.classList.add("row");
            row1.classList.add("center");
            
            var col1 = document.createElement("div");
            col1.classList.add("col");
            col1.classList.add("l5");
            var opt1 = document.createElement("input");
            opt1.setAttribute("type","radio");
            opt1.setAttribute("name",i);
            opt1.setAttribute("id","1"+i);
            var label1 = document.createElement("label");
            label1.setAttribute("for","1"+i);
            label1.innerHTML = option1[i];
            col1.appendChild(opt1);
            col1.appendChild(label1);
            
            var col2 = document.createElement("div");
            col2.classList.add("col");
            col2.classList.add("l5");
            var opt2 = document.createElement("input");
            opt2.setAttribute("type","radio");
            opt2.setAttribute("name",i);
            opt2.setAttribute("id","2"+i);
            var label2 = document.createElement("label");
            label2.setAttribute("for","2"+i);
            label2.innerHTML = option2[i];
            col2.appendChild(opt2);
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
            var opt3 = document.createElement("input");
            opt3.setAttribute("type","radio");
            opt3.setAttribute("name",i);
            opt3.setAttribute("id","3"+i);
            var label3 = document.createElement("label");
            label3.setAttribute("for","3"+i);
            label3.innerHTML = option3[i];
            col3.appendChild(opt3);
            col3.appendChild(label3);
            
            var col4 = document.createElement("div");
            col4.classList.add("col");
            col4.classList.add("l5");
            var opt4 = document.createElement("input");
            opt4.setAttribute("type","radio");
            opt4.setAttribute("name",i);
            opt4.setAttribute("id","4"+i);
            var label4 = document.createElement("label");
            label4.setAttribute("for","4"+i);
            label4.innerHTML = option4[i];
            col4.appendChild(opt4);
            col4.appendChild(label4);
            
            row2.appendChild(col3);
            row2.appendChild(col4);
            
            /* Creating form  */
            var form = document.createElement("form");
            form.setAttribute("action","");
            form.setAttribute("onchange","navbarColor(this)");
            form.setAttribute("id","form"+i);
            form.appendChild(row1);
            form.appendChild(row2);
            
            var row3 = document.createElement("div");
            row3.classList.add("row");
            var colbut = document.createElement("div");
            colbut.classList.add("col");
            colbut.classList.add("l2");
            colbut.innerHTML="<a class=\"waves-effect waves-light orange btn\" onclick=\"mark(this)\">Mark</a>";
            var colnext = document.createElement("div");
            colnext.classList.add("col");
            colnext.classList.add("l2");
            colnext.classList.add("offset-l7");
            if(i<1)
              colnext.innerHTML="<a class=\"waves-effect waves-light green btn\" onclick=\"next()\">Next -></a>";
            else
                colnext.innerHTML="<a class=\"waves-effect waves-light green btn\" onclick=\"endQuiz()\">Submit</a>";
            row3.appendChild(colbut);
            row3.appendChild(colnext);
            
            
            /*adding rows to card */
            divEle.appendChild(question);
            divEle.appendChild(form);
            divEle.appendChild(row3);
            listEle.appendChild(divEle);
            rootTag.appendChild(listEle);
        } 
    wheel = $("#questions").flipster({
        style: 'carousel',
        spacing: 0.7,
		nav: true,
        start: 0,
    });
    
    
    function next()
    {
        var n = $("#questions").flipster();
        n.flipster('next');
    }
    
    
    function navbarColor(ele)
    {
        var parentDiv = ele.parentNode.parentNode.parentNode;
        var link = document.getElementById(parentDiv.getAttribute("data-flip-title"));
        link.style.background="green";
    }
    
    function HandleBackFunctionality()
{
       if(window.event) //Internet Explorer
       {
           alert("Browser back button is clicked on Internet Explorer...");
       }
       else //Other browsers e.g. Chrome
       {
           alert("Browser back button is clicked on other browser...");
       }
}
    
    function mark(ele)
    {
        var parentDiv =ele.parentNode.parentNode.parentNode.parentNode.parentNode;
        var link = document.getElementById(parentDiv.getAttribute("data-flip-title"));
        if(link.style.background=="orange"){
        link.style.background="";
            ele.innerHTML="Mark";
            link.classList.add("flipster__nav__link");
        }
        else
            {
                link.style.background="orange";
                ele.innerHTML="Unmark";
            }
    }
    
    function endQuiz()
    {
        isQuiz = false;
        var clock = document.getElementById("myclock");
        clock.parentNode.removeChild(clock);
        var usrAnswers = new Array(10);
        var score=0 , correct=0 ;
        var unmarked = 0;
        for(i=0;i<10;i++)
            {
               var radios = document.getElementsByName(i);
                for(j=0;j<radios.length;j++)
                    {
                        if(radios[j].checked)
                            {
                                usrAnswers[i]=radios[j].nextSibling.innerHTML;
                                if(usrAnswers[i]==answers[i])
                                    {
                                        correct++;
                                        score+=5;
                                        usrAnswers[i]="";
                                    }
                            }
                        else{
                            unmarked++;
                        }
                        
                    }
            }
        ajaxCall(score,correct,usrAnswers,unmarked);
    }
    
    function ajaxCall(score,correct,usrAnswers,unmarked)
    {
        var valid_link = "http://localhost/QuizWebsite/gameover.php";
        var ajaxObj = new XMLHttpRequest();
        var usrName="<?php echo $_SESSION['username']?>";
      //  usrName = <?php if(isset($_SESSION['username'])) {echo $_SESSION['username'] ;} ?>;
        var data = {"score":score , "correct":correct, "user":usrName, "game": "<?php echo $game ?>" };
           ajaxObj.onreadystatechange = function(){
			
               if (ajaxObj.readyState == 4  ){
                  var jsonObj = JSON.parse(ajaxObj.responseText);
                  var rootTag = document.getElementById("questions");
                  rootTag.parentNode.removeChild(rootTag); 
                  var spare = document.getElementById("spare");
                  spare.style.height="100px";

                  var body = document.getElementById("body");
                  var rowDiv = document.createElement("div");
                  rowDiv.classList.add("row");
                  var colDiv = document.createElement("div");
                  colDiv.classList.add("col");
                  colDiv.classList.add("l8");
                  colDiv.classList.add("card");
                  colDiv.classList.add("offset-l2");
                  var pieChart = document.createElement("div");
                   pieChart.setAttribute("id","test");
                  colDiv.appendChild(pieChart);
                  rowDiv.appendChild(colDiv);
                  body.appendChild(rowDiv);

                   var statDiv = document.createElement("div");
                   statDiv.classList.add("statistic");
                   var thisgame = document.createElement("div");
                   thisgame.classList.add("value");
                   thisgame.innerHTML = (correct/10)*100+"%" ;
                   var thislabel = document.createElement("div");
                   thislabel.classList.add("label");
                   thislabel.innerHTML="This Game";
                   statDiv.appendChild(thisgame);
                   statDiv.appendChild(thislabel);
                   
                   var statDiv1 = document.createElement("div");
                   statDiv1.classList.add("statistic");
                    var allyourgames = document.createElement("div");
                   allyourgames.classList.add("value");
                   usrcorrect= Number(usrcorrect)+correct;
                   totalq = Number(totalq)+10;
                   var s = ((usrcorrect)/(totalq))*100;
                   allyourgames.innerHTML = s.toFixed(1)+"%";
                   var alllabel = document.createElement("div");
                   alllabel.classList.add("label");
                   alllabel.innerHTML="All Your Games";
                   statDiv1.appendChild(allyourgames);
                   statDiv1.appendChild(alllabel);
                   
                   var statDiv2 = document.createElement("div");
                   statDiv2.classList.add("statistic");
                    var allgames = document.createElement("div");
                   allgames.classList.add("value");
                   ecorrect = Number(ecorrect)+correct;
                   etotalq= Number(etotalq)+10;
                   s = ((ecorrect)/(etotalq))*100;
                   allgames.innerHTML = s.toFixed(1)+"%";
                   var _alllabel = document.createElement("div");
                   _alllabel.classList.add("label");
                   _alllabel.innerHTML="Average (Everyone)";
                   statDiv2.appendChild(allgames);
                   statDiv2.appendChild(_alllabel);
                   
                   var statDiv3 = document.createElement("div");
                   statDiv3.classList.add("statistic");
                    var back = document.createElement("div");
                   back.classList.add("value");
                   back.innerHTML = "<a href=\"homepage.php\"> HOME </a>" ;
                   var _allback = document.createElement("div");
                   _allback.classList.add("label");
                   _allback.innerHTML="Play Again";
                   statDiv3.appendChild(back);
                   statDiv3.appendChild(_allback);
                   
                   var statGroup = document.createElement("div");
                   statGroup.classList.add("statistics");
                   statGroup.classList.add("ui");
                   statGroup.appendChild(statDiv);
                   statGroup.appendChild(statDiv1);
                   statGroup.appendChild(statDiv2);
                   statGroup.appendChild(statDiv3);
                  // colDiv.appendChild(statGroup);

                   var statRow = document.createElement("div");
                   statRow.classList.add("row");
                   var statCol = document.createElement("div");
                   statCol.classList.add("col");
                   statCol.classList.add("l8");
                   statCol.classList.add("offset-l2");
                   statCol.appendChild(statGroup);
                   statRow.appendChild(statCol);
                   colDiv.appendChild(statRow);
    
                   var collapsible = document.createElement("ul");
                   collapsible.classList.add("collapsible");
                   collapsible.innerHTML ="<li>"+"<div class=\"collapsible-header\"><img src=\"downicon.png\"></img>Answers</div>" + "<div class=\"collapsible-body\" id=\"collapseddata\"></div>"
                   colDiv.appendChild(collapsible);
                   var collapsedData = document.getElementById("collapseddata");
                   var answerNodes = new Array(10);
                   var j=0;
                   for(i=0;i<10;i++)
                       {
                           if(usrAnswers[i]!="")
                               {
                                   answerNodes[j] = document.createElement("p");
                                   answerNodes[j].innerHTML = "<h2 class=\"flow-text\"> Q. "+questions[i]+"</h2>"+"<br/>"+"Answer: "+answers[i]+"<hr/>";
                                   collapsedData.appendChild(answerNodes[j]);
                                   j++;
                               }
                       }  
                     $(document).ready(function(){
                       $('.collapsible').collapsible({
                         accordion : false 
                        });
                     });
                    drawChart(correct,unmarked);
                }
            }
           ajaxObj.open("POST",valid_link,true);
           ajaxObj.send(JSON.stringify(data));
        
    }
    

 function drawChart(correct,unmarked){
     var incorrect = 10-correct;
     var correctDeg = (correct/10)*360;
     var incorrectDeg = (incorrect/10)*360;
     var unmarkedDeg = (unmarked/10)*360;
        // Build the chart
        var charts = new Highcharts.Chart({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                renderTo: 'test'
            },
            title: {
                text: 'Quiz Stats'
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
                }, {
                    name: 'Unmarked',
                    y: unmarkedDeg
                }]
            }]
        });

 }
</script>
    </body>
</html>