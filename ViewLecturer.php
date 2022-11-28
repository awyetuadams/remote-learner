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
           <br/>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <td class="col-md-2">First Name</td>
                      <td class="col-md-2">Last Name</td>
                      <td class="col-md-3">Email</td>
                      <td class="col-md-2">Course</td>
                      <td class="col-md-3"></td>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $userac=new UserDB();
                  $myacc=$userac->GetLecturer();
                  if(count($myacc)){
                      for($i=0;$i<count($myacc);$i++){
                          echo"<tr>";
                          echo "<td>{$myacc[$i]['FirstName']}</td>";
                          echo "<td>{$myacc[$i]['LastName']}</td>";
                          echo "<td>{$myacc[$i]['Email']}</td>";
                          echo "<td>{$myacc[$i]['CourseId']}</td>";
                          echo "<td></td>";
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