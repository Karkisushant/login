<?php

session_start();
require_once "connection.php";
if(!empty($_POST ) && $_SERVER["REQUEST_METHOD"]=='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cgender=$_POST['gender'];
    $country=$_POST['country'];

    $sql="INSERT INTO tbl_login (name,email,password,gender,country) VALUES ('$name','$email','$password','$gender','$country') ";
    $result=mysqli_query($conn,$sql);
    var_dump($result);
    if($result==true)
    {
        $_SESSION['success']='User was inserted';
        header('Location:index.php');
    }
}
else
{
    $_SESSION['error']='Invalid acces';
    header('Location:index.php');
}