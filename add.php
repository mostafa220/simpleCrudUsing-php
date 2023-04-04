<?php
include('inc/header.php');

if (isset($_POST['submit'])) {
  $name = validateString($_POST['name']);
  $email = validateString($_POST['email']);
  $password = ($_POST['password']);
  if (requireInput($name) && requireInput($email) && requireInput($password)) {
    if (valMin($name, 5) && valMax($password, 10)) {
      if(validateEmail($email)){
        $hashedPassword= password_hash($password,PASSWORD_DEFAULT);
        $sql ="INSERT INTO `users` (`name`,`email`, `password` ) VALUES
         ( '$name','$email','$hashedPassword' ) ";
         $result=mysqli_query($conn,$sql);
         if($result){
          $success = "inserted successfuly";
         }
      }else{
        $error = "plz enter a valid email";

      }
    } else {
      $error = "name must be grater than 3 chars and password must be less than 10 chars";
    }
  } else {
    $error = "plz fill all fields";
  }
}


?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<?php if ($error) : ?>
  <h5 class="alert alert-danger text-center"><?php echo $error; ?> </h5>
<?php endif; ?>
<?php if ($success) : ?>
  <h5 class="alert alert-success text-center"><?php echo $success; ?> </h5>
<?php endif; ?>
<div class="col-md-6 offset-md-3">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="my-2 p-3 border">
    <div class="form-group">
      <label for="exampleInputName1">Full Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputName1">
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Email address</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include('inc/footer.php'); ?>