<?php
include('inc/header.php');

if (isset($_POST['submit'])) {
  $name = validateString($_POST['name']);
  $email = validateString($_POST['email']);
  $password = validateString($_POST['password']);
  $id = ($_POST['id']);
  if (requireInput($name) && requireInput($email)) {
    if (valMin($name, 5)) {
      if (validateEmail($email)) {
        if ($password) {
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          $sql = "UPDATE  `users` SET `name`='$name',`email`='$email' , `password`='$hashedPassword' WHERE `id`='$id' ";
        } else {
          $sql = "UPDATE  `users` SET `name`='$name',`email`='$email'  WHERE `id`='$id' ";
        }
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $success = "updated successfuly";
          header('refresh:2;url=index.php');
        }
      } else {
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
<h1 class="text-center col-12 bg-info py-3 text-white my-2">Update User</h1>
<?php if ($error) : ?>
  <h5 class="alert alert-danger text-center"><?php echo $error; ?> </h5>
  <a href="javascript:history.go(-1)" class="btn btn-primary"><< go back</a>
<?php endif; ?>
<?php if ($success) : ?>
  <h5 class="alert alert-success text-center"><?php echo $success; ?> </h5>
<?php endif; ?>
<?php include('inc/footer.php'); ?>