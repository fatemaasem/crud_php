<?php
include ("inc/header.php");
include ("inc/validation.php");
if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:index.php");
    }
    $id=$_GET['id'];
    $sql="SELECT * FROM users WHERE user_id=$id";
    $result=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($result);
    if(!$check){
        header("Location:index.php");
    }
   $row=mysqli_fetch_assoc($result);
   
?>
  <h1 class="text-center col-12 bg-info py-3 text-white my-2">Edit User</h1>
    
    <?php if($success):?>
    <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif?>
     <?php if($error):?>
    <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
    <?php endif?>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST"  action="update.php"?>
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" value='<?= $row['user_name']?>'class="form-control" id="exampleInputName1" >
                <input type="hidden" value="<?php echo $id; ?>" name="id" />
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="text" name="email"  value ='<?= $row['user_email']?>'class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Change</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>
