<?php
require_once'database.php';
use reza\karim\database;
class student{
     //db connection
    protected function dbConnection(){
         
           
    }//end method


//store student info
public function storeStudentInfo($data){

 
    
   
    $name=$data['name'];
    $email=$data['email'];
    $phone=$data['phone'];

    // echo '<pre>';
    // print_r($data);

    $sql="INSERT INTO students(name,email,phone) VALUES('$name','$email','$phone')";


    if(mysqli_query(database::dbConnection(),$sql)){
        //$sms='Student info saved successfully';
        //return $sms;
        header("Location:view.php?info=".urlencode('Data saved successfully'));
    } else{
        die('query problem'.mysqli_error(database::dbConnection()));
    }
}//end method


//get all student info
public function getAllData(){
    $sql="SELECT * FROM students";

    if(mysqli_query(database::dbConnection(),$sql)){
        $x=mysqli_query(database::dbConnection(),$sql);
        return $x;
        // $row=mysqli_fetch_assoc($x);
        // echo '<pre>';
        // print_r($row);
       
    } else{
        die('query problem'.mysqli_error(database::dbConnection()));
    }
}//end method


//get student info by id
public function getStudentInfoById($id){

   
    $sql="SELECT * FROM `students` WHERE id='$id'";
    if(mysqli_query(database::dbConnection(),$sql)){
        $data=mysqli_query(database::dbConnection(),$sql);

        return $data;

         

    }else{
        die('query problem'.mysqli_error(database::dbConnection()));
    }
}//end method



//update student info
public function updateStudentInfoById($data){
    $id=$data['id'];
    $name=$data['name'];
    $email=$data['email'];
    $phone=$data['phone'];

    $sql="UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id='$id'";

    if(mysqli_query(database::dbConnection(),$sql)){
        header("Location:view.php?message=".urlencode('Data updated successfully'));
    }
}//end method



//delete student info
public function deleteStudentInfo($id){
    $sql="DELETE FROM students WHERE id='$id'";

    if(mysqli_query(database::dbConnection(),$sql)){
        //$message='Student info deleted successfully';

        //return $message;
        header("Location:view.php?message=".urlencode('Data deleted successfully'));
    } else{
        die('query problem'.mysqli_error(database::dbConnection()));
    }
}//end method






}//end  