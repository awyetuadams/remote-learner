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
         $con=new VirtualDB();
          if(!isset($_SESSION['user'])){
             header("location:login.php"); 
         }else{
             if($_SESSION['role']!="RL02") {
               header("location:index.php");   
             }        
         }
         ?>
         
         <br/>
         
 <?php
require_once('pdo.php');

if(!is_dir('up')){mkdir('up');}

@$file = $_FILES['fichier']['name'];
@$tmp = $_FILES['fichier']['tmp_name'];

@$courseid = $_POST['CourseId'];

if(!empty($file)){
  move_uploaded_file($tmp, 'up/'.$file);
  $pdo->query("INSERT INTO myfiles (fichier, CourseId) VALUES ('$file', '$courseid')");
  if($pdo){
    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Success!</strong> Course Material Added </div>';
  }
  else{
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Error!</strong> Unable To Save File </div>';
  }
}

?>
         
         <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Add Material</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>  
  <div class="col-md-4">
  <input type="file" name="fichier" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="CourseId">Course</label>
  <div class="col-md-4">
    <select id="CourseId" name="CourseId" class="form-control">
      <?php
     // $conn=new VirtualDB();
      $email=$_SESSION['user'];
      $roles=$con->GetCourseIdLect($email);
      if(count($roles)){
          for($i=0;$i<count($roles);$i++){
              echo "<option value={$roles[$i]['CourseId']}>{$roles[$i]['CourseId']}</option>";
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
    <button type="submit" value="Upload" class="btn btn-primary">Upload</button>
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