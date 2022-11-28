<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>e-learner</title>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css">
         <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
         
    </head>
<?php
include 'Includes/navigation.php';

$getReg = $_GET['CourseId'];
$getEmail = $_SESSION['user'];

$cont=new VirtualDB();
 $getregistered= $cont ->GetIfRegistered($getEmail, $getReg);
 if(!count($getregistered)){
 $status=$cont->RegisterCourse($getEmail,$getReg);
  if($status>0){
   header("location:DashBoard.php");
    }else{
     echo "<p>Oops! Something's Wrong. Try Again</p>" ;
   }
 }
 else {
   echo "Already Registered";
   //header("location:DashBoard.php");
}
?>
 <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>