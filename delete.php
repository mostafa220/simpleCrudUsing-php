<?php  include('inc/header.php'); 

    if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
        header('location:index.php');
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` where `id`='$id' limit 1 ";
    $res = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($res);
    if(!$check){
        header('location:indax.php');
    }
    $sql2 = "DELETE from `users` where `id`='$id'";
    $res2 = mysqli_query($conn,$sql2);
    ?>


<h1 class="text-center col-12 bg-danger py-3 text-white my-2"> User Has Been Deleted </h1>
<?php header("refresh:2;url=index.php"); ?>
<?php  include('inc/footer.php'); ?>

  
   


