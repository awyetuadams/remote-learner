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
             header("location:login.php"); 
         }else{
             
             
             if($_SESSION['role']!="RL01") {
               header("location:index.php");   
             }        
         
         }
         ?>
         <?php
         $lectac=new UserDB();
         if(isset($_GET['Email'])){
             $status=$lectac->DeleteLecturer($_GET['Email']);
         }
         ?>
          <br/>
           <table class="table table-hover">
              <thead>
                  <tr>
                      <td>First Name</td>
                      <td>Last Name</td>
                      <td>Email</td>
                      <td>Course</td>
                      <td></td>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  
                  $myacc=$lectac->GetLecturer();
                  if(count($myacc)){
                      for($i=0;$i<count($myacc);$i++){
                          echo"<tr>";
                          echo "<td>{$myacc[$i]['FirstName']}</td>";
                          echo "<td>{$myacc[$i]['LastName']}</td>";
                          echo "<td>{$myacc[$i]['Email']}</td>";
                          echo "<td>{$myacc[$i]['CourseId']}</td>";
                          echo "<td><a  href='DeleteLecturer.php?Email={$myacc[$i]['Email']}' OnClick='return del();'>Delete</a></td>";
                          echo"</tr>";
                      }
                  }
                  ?>
              </tbody>
          </table>
          <br/>
          <br/>
          <div class="container footer">
          <p>  &copy; e-learner 2015 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>