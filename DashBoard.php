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
             if($_SESSION['role']!="RL03") {
               header("location:index.php");   
             }        
         }
         
         ?>
          <br/>
           <br/>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <td class="col-sm-2">Course Code</td>
                      <td class="col-md-2">Course Name</td>
                      <td class="col-md-2"></td>
                  </tr>
              </thead>
              <tbody>
                  <?php
         $courseac=new VirtualDB();
         if(isset($_GET['CourseId'])){
             $status=$courseac->LeaveCourse($_GET['CourseId']);
         }
         ?>
                  <?php
                  $seecourse=new VirtualDB();
                  if(isset($_GET['CourseId'])){
             $status=$courseac->LeaveCourse($_GET['CourseId']);
         }
                  $mycourse=$seecourse->GetRegisteredCourses($_SESSION['user']);
                  if(count($mycourse)){
                      for($i=0;$i<count($mycourse);$i++){
                          echo"<tr>";
                          echo "<td class='col-sm-2'><a href=StudentsContent.php?CourseId={$mycourse[$i]['CourseId']}>{$mycourse[$i]['CourseId']}</a></td>";
                          echo "<td class='col-md-2'>{$mycourse[$i]['CourseName']}</td>";
                          echo "<td><a  href=DashBoard.php?CourseId={$mycourse[$i]['CourseId']}>Leave</a></td>";
                          echo "<td class='col-md-2'></td>";
                          echo"</tr>";
                      }
                  }
                  ?>
              </tbody>
          </table>
          <br/>
          <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>