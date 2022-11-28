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
         $courseac=new VirtualDB();
         if(isset($_GET['CourseId'])){
             $status=$courseac->DeleteCourse($_GET['CourseId']);
         }
         ?>
          <br/>
          <div class="container">
           <table class="table table-hover"><br/><br/>
              <thead>
                  <tr>
                      <td class="col-sm-2">Course Code</td>
                      <td class="col-sm-2">Course Name</td>
                      <td class="col-sm-3">Description</td>
                      <td class="col-sm-4"></td>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  
                  $myacc=$courseac->GetCourse();
                  if(count($myacc)){
                      for($i=0;$i<count($myacc);$i++){
                          echo"<tr>";
                          echo "<td>{$myacc[$i]['CourseId']}</td>";
                          echo "<td>{$myacc[$i]['CourseName']}</td>";
                          echo "<td>{$myacc[$i]['Description']}</td>";
                          echo "<td><a  href='DeleteCourse.php?CourseId={$myacc[$i]['CourseId']}' OnClick='return del();'>Delete</a></td>";
                          echo"</tr>";
                      }
                  }
                  ?>
              </tbody>
           </table>
          </div>
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