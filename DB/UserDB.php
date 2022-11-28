<?php
/**
 * Description of UserDB
 */
class UserDB {
 public function AddLecturer($firstname,$lastname,$email,$password,$courseid){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("insert into lecturers(firstname,lastname,email,password,courseid) values(:FirstName,:LastName,:Email,:Password,:CourseId)");
          $sth->bindParam(":FirstName",$firstname);
          $sth->bindParam(":LastName",$lastname);
          $sth->bindParam(":Email",$email);
          $sth->bindParam(":Password",$password);
          $sth->bindParam(":CourseId",$courseid);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function UpdateLecturer($firstname,$lastname,$newpassword,$email){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("update lecturers set firstname=:FirstName,lastname=:LastName,password=:NewPassword where email=:user");
          $sth->bindParam(":FirstName",$firstname);
          $sth->bindParam(":LastName",$lastname);
          $sth->bindParam(":user",$email);
          $sth->bindParam(":NewPassword",$newpassword);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
    
    public function AddStudent($firstname,$lastname,$email,$password){
         $connect=null;
         $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("insert into students(firstname,lastname,email,password) values(:FirstName,:LastName,:Email,:Password)");
          $sth->bindParam(":FirstName",$firstname);
          $sth->bindParam(":LastName",$lastname);
          $sth->bindParam(":Email",$email);
          $sth->bindParam(":Password",$password);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         }
      unset($connect);
      return $rowCount; 
    }
 
    public function GetLecturer(){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select FirstName,LastName, Email,CourseId from lecturers");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $acc=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $acc;
    }
    
 public function DeleteLecturer($email){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete from lecturers where email=:Email");
          $sth->bindParam(":Email",$email);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
 }
 
 public function DeleteStudent($email){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("delete * from  students");
          $sth->bindParam(":Email",$email);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
 }

 public function LogUserIn($email,$password){
      $connect=null;
      $logstatus=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select email,role from userlogins where email=:user and password=:pass");
          $sth->bindParam(":user",$email);
          $sth->bindParam(":pass",$password);
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $logstatus=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $logstatus; 
 }
 
 public function GetPasswordReset($email){
      $connect=null;
      $logstatus=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from userlogins where email=:Email");
          $sth->bindParam(":Email",$email);
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $logstatus=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $logstatus; 
 }
 public function PasswordUpdate($newpassword, $email){
     $connect=null;
     $rowCount=0;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("update userlogins set password=:NewPassword where email=:Email");
          $sth->bindParam(":NewPassword",$newpassword);
          $sth->bindParam(":Email",$email);
          $sth->execute();
          $rowCount=$sth->rowCount();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $rowCount; 
    }
 
  public function GetUserRoles(){
      $connect=null;
      $roles=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select * from roles");
          $sth->setFetchMode(PDO::FETCH_ASSOC);
          $sth->execute();
          $roles=$sth->fetchAll();
         }catch(PDOException $ex){
             echo $ex->getMessage();           
         } 
      unset($connect);
      return $roles;
    }
    
    
    public function GetStudents(){
          $connect=null;
      $acc=null;
      try{
          $connect=Connection::GetConnection();
          $sth=$connect->prepare("select firstname,lastname,email from students");
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