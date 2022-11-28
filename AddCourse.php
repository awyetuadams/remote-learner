<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>e-learner</title>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css">
          <script src="ckeditor/ckeditor.js"></script>
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
            <h3 class="text-center">Enlarge Your Pool</h3>
           <br/>
            <br/>
          <?php
           $cont=new VirtualDB();
          if(isset($_POST['btnSubmit'])){
              $courseid=$_POST['CourseId'];
              $coursename=$_POST['CourseName'];
              $description=$_POST['Description'];
              if(strlen($courseid)!=0&&strlen($coursename)!=0&&strlen($description)!=0){
                  $status=$cont->AddCourse($courseid,$coursename,$description);
                  if($status>0){
                     echo "<p>New Course. Congrats</p>" ;
                  }else{
                       echo "<p>Oops! Something's Wrong. Try Again</p>" ;
                  }
              }
          }
          
          ?>
         <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CourseId">Course Code</label>  
  <div class="col-md-4">
  <input id="txtCourseId" name="CourseId" type="text" placeholder="Course Code" class="form-control input-md" required="">
    
  </div>
</div>
    
<!-- Text area-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CourseName">Course Name</label>  
  <div class="col-md-4">
      <input id="txtCoursename" name="CourseName" type="text" placeholder="Course Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Description">Description</label>  
 <div class="col-md-6">
     <textarea id="txtCourseDescription" name="Description" ></textarea>
  
 </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Add Course</button>
  </div>
</div>

</fieldset>
</form>

        <br/>
        <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
        <script>
             CKEDITOR.replace( 'txtCourseDescription');
            </script>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>