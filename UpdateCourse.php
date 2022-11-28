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
         <script type="text/javascript">
              function del(){
    if (confirm("Are You Sure?"))
    {
      alert("You pressed OK!");
    }
    else
    {
        alert("You pressed Cancel!");
        return false;
    }
}
         </script>
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
            <h3 class="text-center">Update Course</h3>
           <br/>
            <br/>
          <?php
           $roles=new VirtualDB();
           
          if(isset($_POST['btnSubmit'])){
              $courseid=$_POST['CourseId'];
              $coursename=$_POST['CourseName'];
              $description=$_POST['Description'];
              
              if(strlen($coursename)!=0&&strlen($description)!=0){
                  $status=$roles->UpdateCourse($courseid,$coursename,$description);
                  if($status>0){
                     echo "<p>Updated Successfully</p>" ;
                  }else{
                       echo "<p>Oops! Something's Wrong. Try Again</p>" ;
                  }
              }
          }
          
          ?>
         <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="CourseId">Course</label>
  <div class="col-md-3">
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
    
<!-- Text area-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CourseName">Course Name</label>  
  <div class="col-md-3">
      <input id="txtCoursename" name="CourseName" type="text" class="form-control input-md" required="">
    
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
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary" OnClick='return del();'>Update Course</button>
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