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
         
         ?>
           <br/>
          <br/>
          <?php
           $roles=new UserDB();
          if(isset($_POST['btnSubmit'])){
              $firstname=$_POST['FirstName'];
              $lastname=$_POST['LastName'];
              $email=$_POST['Email'];
              $password=$_POST['Password'];
              $courseid=$_POST['CourseId'];
              if(strlen($firstname)!=0&&strlen($lastname)!=0&&strlen($email)!=0&&strlen($password)!=0){
                  $status=$roles->AddLecturer($firstname,$lastname,$email,$password,$courseid);
                  if($status>0){
                     echo "<p>You Now Have A New Lecturer</p>" ;
                  }else{
                       echo "<p>Oops! Something's Wrong. Try Again</p>" ;
                  }
              }
          }
          
          ?>
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

<!-- Form Name -->
<legend>Add Lecturer</legend>

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
  <label class="col-md-4 control-label" for="txtEmail">Email</label>  
  <div class="col-md-4">
  <input id="txtEmail" name="Email" type="text" placeholder="Email" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPassword">Password</label>  
  <div class="col-md-4">
  <input id="txtPassword" name="Password" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CourseId">Course</label>
  <div class="col-md-4">
    <select id="CourseId" name="CourseId" class="form-control">
      <?php
      $con=new VirtualDB();
      $roles=$con->GetCourseId();
      if(count($roles)){
          for($i=0;$i<count($roles);$i++){
              echo "<option value={$roles[$i]['CourseId']}>{$roles[$i]['CourseId']}</option>";
          }
      }      
      ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Add Lecturer</button>
    <button id="btnSubmit" class="btn btn-defaut" value="reset">Clear</button>
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