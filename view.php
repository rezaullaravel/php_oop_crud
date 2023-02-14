

<?php
require_once'student.php';

$sms='';
$message='';
$nameErr='';
$emailErr='';

$student=new student();

//data view
$x=$student->getAllData();

//data insert
if (isset($_POST['btn'])){
     if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }
            
            if(empty($_POST["email"])) {
               $emailErr = "Email is required";
            } 

            if (!empty($_POST["name"]) && !empty($_POST["email"])){
                $sms=$student->storeStudentInfo($_POST);
            }

    // $sms=$student->storeStudentInfo($_POST);
}

 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

//data delete
if(isset($_GET['delete'])){
    $id=$_GET['id'];
    $message=$student->deleteStudentInfo($id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Php oop crud</title>
</head>
<body>
 
<div class="container">
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-4">
            <h2>Add Student Info</h2>
            <h3 class="text text-danger"><?php echo $sms;?></h3>
            <?php 
            if(isset($_GET['info'])){
                echo "<h2 class='text text-danger'>".$_GET['info']. "</h2>";
            }
            ?>
            <div class="card">
                <div class="card-body">
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <sapn><?php echo $nameErr;?></span>
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <sapn><?php echo  $emailErr;?></span>
                        
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone number</label>
                        <input type="number" name="phone" class="form-control" placeholder="Enter phone number" >
                        
                    </div>


                    <div class="form-group">
                        
                        <input type="submit" class="form-control btn btn-success" name="btn" value="Submit" placeholder="Enter email">
                        
                    </div>
                    
                   
                    
                </form>
                </div>
            </div>
        </div><!--col sm 4-->

        <div class="col-sm-8">
            <h2>Student list</h2>
            <?php 
            if(isset($_GET['message'])){
                echo "<h2 class='text text-danger'>".$_GET['message']. "</h2>";
            }
            ?>
            <h2 class="text-danger"><?php echo $message;?></h2>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg bg-success">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php while($rows=mysqli_fetch_assoc($x)){?>
                            <tr>
                                <td><?php echo $rows['id'];?></td>
                                <td><?php echo $rows['name'];?></td>
                                <td><?php echo $rows['email'];?></td>
                                <td><?php echo $rows['phone'];?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $rows['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="?delete=true&id=<?php echo $rows['id']; ?>" onclick="return confirm('Are you sure to delete it???');" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                                
                            </tr>
                        <?php }?>

                           

                           

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--col sm 8-->
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>