<?php
/**
 * Adamx
 * Description of VirtualDB
 */
class VirtualDB {
    public function GetAllmyfiles(){
      $connect=null;
      $category=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from myfiles");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $category=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $category;
    }
    
    public function DeleteMaterial($id){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete from  myfiles where id=:id");
          $sth->bindParam(":id",$id);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
 }
  
 public function LeaveCourse($courseid){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete from  registercourses where courseid=:CourseId");
          $sth->bindParam(":CourseId",$courseid);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
 }
    public function GetRegisteredCourses($email){
      $connect=null;
      $category=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select course.CourseName, registercourses.CourseId from course inner join registercourses on course.CourseId =registercourses.CourseId where registercourses.Email ='$email'");
          $sth->bindParam(":Email",$email);
          $sth->setFetchMode(PDO::FETCH_ASSOC);          
          $sth->execute();
          $category=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $category;
    }
    
     public function GetRegisteredDel($email,$courseid){
      $connect=null;
      $category=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete course.CourseName, registercourses.CourseId from course inner join registercourses on course.CourseId =registercourses.CourseId where registercourses.Email ='$email'");
          $sth->bindParam(":Email",$email);
          $sth->bindParam(":CourseId",$courseid);
          $sth->setFetchMode(PDO::FETCH_ASSOC);          
          $sth->execute();
          $category=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $category;
    }
    
    public function GetIfRegistered($email,$courseid){
      $connect=null;
      $category=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from registercourses where CourseId = :CourseId and Email=:Email");
          $sth->bindParam(":CourseId",$courseid);
          $sth->bindParam(":Email",$email);
          $sth->setFetchMode(PDO::FETCH_ASSOC);          
          $sth->execute();
          $category=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $category;
    }

    public function GetLecturerForEdit(){
         $connect=null;
      $newscont=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from lecturers");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $newscont=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return  $newscont;
    }

    public function GetCourseDetails($courseid){
       $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select CourseName from course");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
    
    public function AddMaterial($courseid, $filespath, $filename){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("insert into myfiles(FilePath, FileName, CourseId) values(:FilePath, :FileName, :CourseId)");
          $sth->bindParam(":FilePath",$filespath);
          $sth->bindParam(":FileName",$filename);
          $sth->bindParam(":CourseId",$courseid);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function AddCourse($courseid,$coursename,$description){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("insert into course(courseid,coursename,description) values(:CourseId,:CourseName,:Description)");
          $sth->bindParam(":CourseId",$courseid);
          $sth->bindParam(":CourseName",$coursename);
          $sth->bindParam(":Description",$description);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function UpdateCourse($courseid,$coursename,$description){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("update course set coursename=:CourseName, description=:Description where courseid=:CourseId");
          $sth->bindParam(":CourseId",$courseid);
          $sth->bindParam(":CourseName",$coursename);
          $sth->bindParam(":Description",$description);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function RegisterCourse($email,$courseid){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("insert into registercourses(email, courseid) values(:Email,:CourseId)");
          $sth->bindParam(":Email",$email);
          $sth->bindParam(":CourseId",$courseid);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function DeleteCourse($courseid){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete from  course where courseid=:CourseId");
          $sth->bindParam(":CourseId",$courseid);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
 }
 
   public function GetCourseId(){
      $connect=null;
      $roles=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from course");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $roles=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $roles;
    }
    
    public function GetCourseIdLect($email){
      $connect=null;
      $roles=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select CourseId from lecturers where email =:user");
          $sth->bindParam(":user",$email);
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $roles=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $roles;
    }
 
 public function GetCourse(){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select CourseId,CourseName,Description from course");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
    
     public function GetCourseForView(){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select CourseName, CourseId, Description from course");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
    
    public function GetMaterial($id){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("SELECT  * FROM myfiles where CourseId='$id'");
          $sth->bindParam(":CourseId",$id);
          $sth->bindParam(":FileName",$fname);
          $sth->bindParam(":FilePath",$fpath);
          $sth->bindParam(":MaterialId",$mid);
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
     
    public function GetPath($fpath){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("SELECT  FilePath FROM myfiles where CourseId='$id'");
          $sth->bindParam(":CourseId",$id);
          $sth->bindParam(":FilePath",$fpath);
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
    
    public function GetMaterialDel(){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select id, fichier from myfiles");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
        
}
?>
