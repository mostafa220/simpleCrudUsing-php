
<?php 
$serverName="localhost";
$userName="root";
$password="";
$databaseName="first_crud";

$conn=mysqli_connect($serverName,$userName,$password,$databaseName);

if(!$conn){
    die("connect failed :" .mysqli_connect_error());
}