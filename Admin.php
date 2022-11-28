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
             header("location:login.php"); 
         }else{
             if($_SESSION['role']!="RL01") {
               header("location:index.php");   
             }          
         }
         
         ?>
          <br/>
          <div class="centerme"><br/><br/>
          <div class="panel panel-warning">
              <div class="panel-heading text-center">Administrative Control Panel</div>
   <div class="panel-body">
      <div class="col-lg-offset-1 col-lg-3">
          <a href="AddLecturer.php" class="text-warning">Add Lecturer</a>
           <br/>
          <br/>
          <a href="ViewLecturer.php" class="text-warning">View Lecturers</a>
           <br/>
          <br/>
          <a href="DeleteLecturer.php" class="text-warning">Delete Lecturer</a>
          <br/>
          <br/>
          
      </div>
<!--       <div class="col-lg-offset-1 col-lg-3">
           <a href="AddDepartment.php" class="text-warning">Add Department</a>
           <br/>
          <br/>
          <a href="ViewDepartment.php" class="text-warning">View Department</a>
           <br/>
          <br/>
          <a href="DeleteDepartment.php" class="text-warning">Delete Department</a>
          <br/>
          <br/>
          <a href="UpdateDepartment.php" class="text-warning">Update Department</a>
          <br/>
          <br/>
       </div>-->
          <div class="col-lg-offset-1 col-lg-3">
              <a href="AddCourse.php" class="text-warning">Add Course</a>
           <br/>
          <br/>
          <a href="ViewCourse.php" class="text-warning">View Courses</a>
           <br/>
          <br/>
          <a href="DeleteCourse.php" class="text-warning">Delete Courses</a>
          <br/>
          <br/>
          <a href="UpdateCourse.php" class="text-warning">Update Courses</a>
          <br/>
          <br/>
      </div>
      </div>
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

