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
             if($_SESSION['role']!="RL01"){
                 header("location:index.php");
             }
         }
         ?>
         <br/>
          <br/>
          <?php 
           $roles=new UserDB();
          if(isset($_POST['btnSubmit'])){
              if(strlen($_POST['txtUsername'])!=0&&strlen($_POST['txtPassword'])!=0){
                  $username=$_POST['txtUsername'];
                  $password=$_POST['txtPassword'];
                  $userrole=$_POST['cmbRole'];
                 $status=$roles->AddUser($username,$password,$userrole);
                 if($status>0){
                     $randlink = rand();
                     $msg = "Click the Link Below to Verify Your Account \n"
                             . '<a href="Login.php">$randlink</a>';
                    echo "
                       <p> You Now Have A New Lecturer</p>
                        "; 
                 }else {
                     echo "<p>Oops!!! Something's Wrong. Try Again</p>"; 
                 }
                  
              }else{
                  echo "<p>Please Provide a Username and A Password</p>";
              }
          }
          
          ?>
         <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

<!-- Form Name -->
<legend>Add Lecturer</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtUsername">Username</label>  
  <div class="col-md-4">
  <input id="txtUsername" name="txtUsername" type="text" placeholder="Username" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPassword">Password</label>  
  <div class="col-md-4">
  <input id="txtPassword" name="txtPassword" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cmbRole">Account Role</label>
  <div class="col-md-4">
    <select id="cmbRole" name="cmbRole" class="form-control">
      <?php
      $roles=$role->GetUserRoles();
      if(count($roles)){
          for($i=0;$i<count($roles);$i++){
              echo "<option value={$roles[$i]['RoleId']}>{$roles[$i]['RoleName']}</option>";
          }
      }
      
      ?>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Add Lecturer</button>
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