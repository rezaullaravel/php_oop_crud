

<?php
require_once'student.php';



$student=new student();

$id=$_GET['id'];

$data=$student->getStudentInfoById($id);

$x=mysqli_fetch_assoc($data);
// echo '<pre>';
// print_r($valu);


//update data
if(isset($_POST['btn'])){
    $student->updateStudentInfoById($_POST);
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update data</title>
</head>
<body>
 
<div class="container">
    <div class="row" style="margin-top:20px;">
        <div class="col-sm-8 offset-md-2">
            <h2>Update Student Info</h2>
            
            <div class="card">
                <div class="card-body">
                <form action="" method="POST">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="<?php echo $x['name'] ?>" class="form-control" placeholder="Enter name" required>
                        <input type="hidden" name="id" value="<?php echo $x['id'] ?>" class="form-control" placeholder="Enter name" required>
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="<?php echo $x['email'] ?>" class="form-control" placeholder="Enter email" required>
                        
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone number</label>
                        <input type="number" name="phone" value="<?php echo $x['phone'] ?>" class="form-control" placeholder="Enter phone number" required>
                        
                    </div>


                    <div class="form-group">
                        
                        <input type="submit" class="form-control btn btn-success" name="btn" value="Update" placeholder="Enter email">
                        
                    </div>
                    
                   
                    
                </form>
                </div>
            </div>
        </div><!--col sm 4-->

       
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>