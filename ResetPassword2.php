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
         
         if(isset($_POST['btnSubmit'])){
             $email=$_POST['Email'];
             $password=$_POST['Password'];
             $newpassword=$_POST['NewPassword'];
             $uscl=new UserDB();
             
             
             if($password!=$newpassword){
                 echo 'Passwords Do Not Match Please Try Again';
             }
               else{
                   $status=$uscl->PasswordUpdate($newpassword, $email);
                 if($status>0){
                 echo 'Password Changed';
              }else{
                  echo 'There was an error';
             }
         }
         }
         ?>
         
          <br/>
          <form class="form-horizontal" method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

<!-- Form Name -->
<legend>Reset Password</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email"> Enter your email</label>  
  <div class="col-md-4">
  <input id="txtEmail" name="Email" type="text" placeholder="Email" class="form-control input-md" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">New Password</label>  
  <div class="col-md-4">
      <input id="txtPass" name="Password" type="password" class="form-control input-md" required>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">Confirm Password</label>  
  <div class="col-md-4">
  <input id="txtPassword" name="NewPassword" type="password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-3">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-toolbar">Reset Password</button>
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