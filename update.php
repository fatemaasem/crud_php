<?php
include ("inc/header.php");
include ("inc/validation.php");
if(isset($_POST['submit'])){
    $name=santString($_POST['name']);
    $email=santEmail($_POST['email']);
    $id=$_POST['id'];
    if(require_input($name)&&require_input($email)){
        if(minInput($name,3)){
            if(validEmail($email)){
                if(isset($_POST['password'])){
                    $password=$_POST['password'];
                    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
                  
                    $sql = "UPDATE `users` SET  `user_name`='$name' ,`user_email`='$email',`user_password`='$hashed_password' 
                    WHERE `user_id`='$id' ";
                    $result=mysqli_query($conn,$sql);
                }
                else{
                    $sql = "UPDATE `users` SET  `user_name`='$name' ,`user_email`='$email' 
                    WHERE `user_id`='$id' ";
                    $result=mysqli_query($conn,$sql);
                }
                if($result){
                    $success = "Updated Successfully ";
                    header("refresh:3;url=index.php");
                }
            }
            else{
                $error = "Please Type Valid Email !";
            }
        }
        else{
            $error = "Name Must Be Grater Than 3 Chars / Password Must Be Less Than 20 Chars";
        }
    }
    else{
        $error =  "Please Fill All  Fields !";
    }
}

?>
 <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About User</h1>
  
  <?php if($error): ?>
      <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
      <a href="javascript:history.go(-1)" class="btn btn-primary"><< Go Back</a>
  <?php endif;  ?>

  <?php if($success): ?>
      <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
  <?php endif;  ?>

<?php  include('inc/footer.php'); ?>