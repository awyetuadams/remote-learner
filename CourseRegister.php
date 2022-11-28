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
           <div class="container"><br/><br/>
          <table class="table table-responsive">
              <thead>
                  <tr>
                      <td class="col-sm-2">Course Code</td>
                      <td class="col-sm-3">Course Name</td>
                      <td class="col-sm-3">Description</td>
                      <td class="col-sm-4"></td>
                  </tr>
              </thead>
              <tbody>
      <?php
       $seecourse=new VirtualDB();
        $mycourse=$seecourse->GetCourse();
         if(count($mycourse)){
           for($i=0;$i<count($mycourse);$i++){
               echo"<tr>";
                echo "<td>{$mycourse[$i]['CourseId']}</td>";
                echo "<td>{$mycourse[$i]['CourseName']}</td>";
                echo "<td>{$mycourse[$i]['Description']}</td>";
                echo "<td><a  href='ProcessRegister.php?CourseId={$mycourse[$i]['CourseId']}'>Register</a></td>";
                echo"</tr>";
                  }
              }
        ?>
           
              </tbody>
          </table>
           </div>
          <br/>
          <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>