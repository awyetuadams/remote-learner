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
     <div class="container">
         <?php
         include 'Includes/navigation.php';
         if(!isset($_SESSION['user'])){
             header("location:Login.php");
         }else{
             if($_SESSION['role']!="RL02"){
                 header("location:index.php");
             }
         }
         ?>
           <br/>
          <br/>
          <?php
           if(isset($_POST['btnSubmit'])){
              $firstname=$_POST['FirstName'];
              $lastname=$_POST['LastName'];
              $email=$_SESSION['user'];
              $password=$_POST['Password'];
              $newpassword=$_POST['NewPassword'];
              
              $role=new UserDB();
                  if($password!=$newpassword){
                      echo"Password Mismatch";
                  }
              else{
                $status=$role->UpdateLecturer($firstname,$lastname,$newpassword,$email);
                  if($status>0){
                     echo "<p>Profile Changed</p>";
                  }else{
                       echo "<p>Oops! Something's Wrong. Try Again</p>";
                  }
                }
          }
          ?>
         <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

<!-- Form Name -->
<legend>Change Profile</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtFirstName">First Name</label>  
  <div class="col-md-4">
  <input id="txtFirstName" name="FirstName" type="text" placeholder="FirstName" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtLastName">Last Name</label>  
  <div class="col-md-4">
  <input id="txtLastName" name="LastName" type="text" placeholder="LastName" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">New Password</label>  
  <div class="col-md-4">
      <input id="txtPass" name="Password" type="password" placeholder="New Password" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="NewPassword">Confirm Password</label>  
  <div class="col-md-4">
  <input id="txtPassword" name="NewPassword" type="password" placeholder="Confirm Password"class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-toolbar">Update Profile</button>
  </div>
</div>

</fieldset>
</form>
          <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>