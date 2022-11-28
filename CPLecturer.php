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
    <body>
     <div class="centerme">
         <?php
         include 'Includes/navigation.php';
          if(!isset($_SESSION['user'])){
             header("location:login.php"); 
         }else{
             
             
             if($_SESSION['role']!="RL02") {
               header("location:index.php");   
             }        
         
         }
         ?>
          <br/>
          <div class="panel panel-primary">
              <div class="panel-heading text-center"><?php echo  $getEmail . ' Control Panel';?></div>
              <div class="panel-body">
                  <div class="col-lg-offset-2 col-lg-4">
                      <a href="AddMaterial.php">Add Course Material</a>
                      <br/>
                      <br/>
                       <a href="ViewMaterial.php">View Course Material</a>
                       <br/>
                      <br/>
                       <a href="DeleteMaterial.php">Delete Course Material</a>
                       <br/>
                      <br/>
                  </div>
                  
<!--                  <div class="col-lg-offset-2 col-lg-4">
                      <a href="UpdateProfile.php">Update Profile</a>
                      <br/>
                      <br/>
                  </div>-->
              </div>
          </div>
          <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>