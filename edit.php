<?php 
include('inc/db.php');
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){

    header('Location:index.php');
}
$id = $_GET['id'];
$sql= "SELECT * FROM `users` WHERE `id`='$id' LIMIT 1 ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_assoc($result);
if(!$check){
    header('Location:index.php');
}
// var_dump($check);
?>
<?php  include('inc/header.php'); ?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About User</h1>
    <div class="col-md-6 offset-md-3">
        <form action="update.php" method="post" class="my-2 p-3 border">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" value="<?php echo $check['name']; ?>" name="name" class="form-control" id="exampleInputName1" >
                <input type="hidden"  name="id" value="<?php echo $check['id']; ?>" >

            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email"value="<?php echo $check['email']; ?>"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>
