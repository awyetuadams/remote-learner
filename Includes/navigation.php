<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}

?>

<?php
include 'Includes/functions.php';

echo'  
    <div class= "navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">e-learner</a>
      
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
 <li class="active"><a href="index.php">Home</a></li>

 ';

if(!isset($_SESSION['user'])){
 echo '<li><a href="Login.php">Login</a></li>';
}      

if(isset($_SESSION['user'])){
    $getEmail = $_SESSION['user'];
    if($_SESSION['role']=="RL03"){
        echo '<li ><a href="CourseRegister.php">Courses</a></li>';
        echo '<li ><a href="Dashboard.php">Dashboard</a></li>';
    }else{
        echo '';
    }
    if($_SESSION['role']=="RL01"){
        echo '<li><a href=Admin.php>Admin</a></li>';
    }else if($_SESSION['role']=="RL02"){
        echo '<li><a href=CPLecturer.php>Lecturer</a></li>';
    }
    echo '<li>
      <a href=Logout.php>Logout</a>  
</li>';
    echo '<li><label class="label label-success pull-right"><h5>Welcome '. $getEmail . '</h5></label></li>';
}
if(!isset($_SESSION['user'])){
echo '<li><a class="active" href=SignUp.php>Sign Up</a></li>';
}
echo'<div id="google_translate_element" class="col-md-3"></div> <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: "en", layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, "google_translate_element");
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></ul></div></div></div><br/><br/>';
    
?>
