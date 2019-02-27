<?php
session_start();
require_once "connection.php";
if(!empty($_POST ) && $_SERVER["REQUEST_METHOD"]=='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $id=$_POST['id'];
    $sql="UPDATE tbl_login SET name='$name',email='$email',password='$password',gender='$gender',country='$country' WHERE  id=".$id;
         $result = mysqli_query($conn,$sql);
    if($result==true)
    {
        $_SESSION['success']='Data was updated';
        header('Location:index.php');
    }
    else{

        $_SESSION['error']='Error';
        header('Location:index.php');


    }
}
else{

    $_SESSION['error']='Invalid access';
    header('Location:index.php');


}
