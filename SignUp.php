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
         
         ?>
           <br/>
          <br/>
          <?php
           $role=new UserDB();
          if(isset($_POST['btnSubmit'])){
              $firstname=$_POST['firstname'];
              $lastname=$_POST['lastname'];
              $email=$_POST['email'];
              $password=$_POST['password'];
              $cpassword=$_POST['CPassword'];
              if(strlen($firstname)!=0&&strlen($lastname)!=0&&strlen($email)!=0&&strlen($password)!=0&&strlen($cpassword)!=0){
                  if((strlen($password))!=(strlen($cpassword))){
                      echo "<p>Oops! Password Mismatch. Try Again</p>" ;
                  }
                  $status=$role->AddUser($firstname,$lastname,$email,$password);
                  if($status>0){
                     echo "<p>Thanks For Taking The First Step To Wider Knowledge.\n Please Login To Your Email To Verify Your Account</p>" ;
                  }else{
                       echo "<p>Oops! Something's Wrong. Try Again</p>" ;
                  }
              }
          }
          
          ?>
         <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

    <legend>Sign Up</legend>
<!-- Form Name -->
<h5><p class="text-danger">* Please Provide Your Personal Details</br>
    * Please Note That All Information Submitted Cannot be Changed Except for Passwords</br>
    * Please Use The Email Provided To Create A Google Account <strong>(For Quizzes And Exams)</strong></br>
    </p>
</h5>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtFirstName">First Name</label>  
  <div class="col-md-4">
  <input id="txtFirstName" name="FirstName" type="text" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtLastName">Last Name</label>  
  <div class="col-md-4">
  <input id="txtLastName" name="LastName" type="text" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtEmail">Email</label>  
  <div class="col-md-4">
  <input id="txtEmail" name="Email" type="text" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPassword">Password</label>  
  <div class="col-md-4">
  <input id="txtPassword" name="Password" type="password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtCPassword">Confirm Password</label>  
  <div class="col-md-4">
  <input id="txtCPassword" name="CPassword" type="password" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Sign Up</button>
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