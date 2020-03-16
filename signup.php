<html>
<?php 
    if (isset($_POST['login']) )
    {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizzing";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Check connection
$name = $_POST['name'];
$userName = $_POST['usr_name'];
$userEmail = $_POST['usr_email'];
$userPassword = $_POST['usr_pwd'];
$userPasswordConfirm = $_POST['usr_pwd_confirm'];
$gender = $_POST['gender'];
if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $dot = ".";
      $file_ext="jpg";
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"users/".$file_name);
      }else{
     }
   }

$sql = "SELECT username,email FROM userdata WHERE username = '$userName'";  
$result = $conn->query($sql);
$valid = FALSE;
if(strcmp($userPassword,$userPasswordConfirm) == 0)
{
 $valid = TRUE;
}
if ($result-> num_rows > 0) { 
 echo '<script type="text/javascript"> alert(\"Username already taken\"); </script>';
} else if($valid == FALSE)
{
    echo '<script> alert(\"Passwords donot match\"); </script>';
}
else {
    $userPassword = md5($userPassword);
    $sql = "INSERT INTO userdata VALUES ('$userName','$userEmail','$userPassword','$name','$gender','$file_name')";
  $result = $conn->query($sql);
if ($result === TRUE) { 
   header("location: index.php");
}
    else
    {
        echo "<script> alert(\"Some error ocured\")</script>";
    }
    
}
    }
?>
    <head>
        <title>Quiz like never before</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
  <body>
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
      <div class=" text-center w3-row" style="height:200px">
          <br/>
          <br/> <br/>
  <h1 style="color:white">Sign Up</h1> 
</div>
<div class="w3-container w3-row ">
<div class="w3-container w3-col l4"> </div>
<div class="w3-container w3-card-12 w3-padding-2 l4 m8 w3-col bg-grey slide">
<form class=" w3-container"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
  <div class="w3-group bg-grey">     
<label class="" id="usrname" >Name</label>  
    <input class="w3-input bg-grey" type="text" name="name" required>
  </div>
  <div class="w3-group bg-grey">  
 <label class="" id="usrpwd">Username</label>  
    <input class="w3-input bg-grey" type="text" name="usr_name" required>
  </div>
     <div class="w3-group bg-grey">  
 <label class="" id="usremail">Email</label>  
    <input class="w3-input bg-grey w3-validate" type="text" name="usr_email" required>
  </div>
       <div class="w3-group bg-grey">  
 <label class="" id="usrpwd">Password</label>  
    <input class="w3-input bg-grey" type="password" name="usr_pwd" required>
  </div>
 <div class="w3-group bg-grey">  
 <label class="" id="usrpwdcon">Confirm password</label>  
    <input class="w3-input bg-grey" type="password" name="usr_pwd_confirm" required>
  </div>
    <div class="w3-group bg-grey"> 
        <label class=""> Gender</label>
        <br/>
        <input class="w3-radio" type="radio" name="gender" value="male" checked >
        <label >Male</label> &nbsp; &nbsp;
        <input class="w3-radio" type="radio" name="gender" value="female">
        <label>Female</label>
    </div>
  <br><br>
<input type="file" name="image">
<button type="submit" value="login" class="btn btn-primary btn-block" name="login" style="background:#337ab7">Signup</button>
  <br><br>
</form>
</div>
<div class="w3-container w3-col l4"> </div>
</div>
</body>
</html>