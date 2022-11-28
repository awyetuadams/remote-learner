<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>First News</title>
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
         <?php
         $userac=new UserAccountDB();
         if(isset($_GET['userid'])){
             $status=$userac->DeleteUserAccount($_GET['userid']);
         }
         ?>
          <br/>
           <table class="table table-hover">
              <thead>
                  <tr>
                      <td></td>
                      <td>Username</td>
                      <td>Password</td>
                      <td>User Role</td>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  
                  $myacc=$userac->GetUserAccounts();
                  if(count($myacc)){
                      for($i=0;$i<count($myacc);$i++){
                          echo"<tr>";
                          echo "<td><a  href=DeleteUserAccount.php?userid={$myacc[$i]['username']}>Delete</a></td>";
                          echo "<td>{$myacc[$i]['username']}</td>";
                          echo "<td>{$myacc[$i]['password']}</td>";
                          echo "<td>{$myacc[$i]['rolename']}</td>";
                          echo"</tr>";
                      }
                  }
                  ?>
              </tbody>
          </table>
          <br/>
          <div class="container footer">
          <p>  &copy; First News 2014 </p>
        </div>
         </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
         
    </body>
</html>