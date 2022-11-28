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
    <body><div class="container"><br/><br/>
          <table class="table table-responsive">
              <thead>
                  <tr>
                      <td>File</td>
                      <td>Download</td>
                  </tr>
              </thead>
              <tbody>

    <?php
    include 'Includes/navigation.php';
    
?>

<?php
 $con=mysqli_connect("localhost", "root", "");
 $db=mysqli_select_db($con, 'virtual_learner' );


$id = (isset($_GET['CourseId']) ? $_GET['CourseId'] : null);
$fname = (isset($_GET['FileName']) ? $_GET['Filename'] : null);

    $res=mysqli_query($con, "SELECT * FROM materials WHERE CourseId='$id'");

    while($row=mysqli_fetch_array($res, $db))
    {

 echo '<tr>';
echo '<td>'; echo $row['FileName'];  echo '<td>';
echo '<td>'; ?><a  href="<?php echo $row['FilePath'];?>">Download</a> <?php echo '</td>';
 echo '</tr>';
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