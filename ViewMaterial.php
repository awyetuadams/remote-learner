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
             
             
             if($_SESSION['role']!="RL02") {
               header("location:index.php");   
             }        
         
         }
         ?>
         
          <br/>
           <table class="table table-hover">
              <thead>
                  <tr>                      
                      <td>Material Id</td>
                      <td>Material Name</td>
                      <td></td>
                  </tr>
              </thead>
              <tbody>
                  <?php
require_once('pdo.php');

$sql = $pdo->query('SELECT * FROM myfiles');

while (@$fetch = $sql->fetch(PDO::FETCH_ASSOC)) {
@$id = $fetch['id'];
  //echo "<a href='script.php?id=$id'>" . $fetch['fichier'] . " </a></br>";
  echo"<tr>";
                          echo "<td class='col-sm-2'>{$fetch['id']}</td>";
                          echo "<td class='col-sm-2'>{$fetch['fichier']}</td>";
                          echo "<td class='col-sm-4'></td>";
                          echo"</tr>";
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