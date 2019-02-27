<?php
session_start();
require_once 'connection.php';
if(!empty($_GET['id']) &&  $_SERVER['REQUEST_METHOD']=='GET')
{
    if((int)$_GET['id'])
    {
        $id=$_GET['id'];
        $sql="DELETE from tbl_login WHERE id=".$id;
        $result=mysqli_query($conn,$sql);

            if($result==true)
            {
                $_SESSION['success']='User was deleted';
                header('Location:index.php');
            }
            else
            {
                $_SESSION['error']='Problem in deletion';
                header('Location:index.php');
            }
    }
    else
    {
        $_SESSION['error']='Invalid ID';
        header('Location:index.php');
    }


}
else
{
    $_SESSION['error']='Invalid acces';
    header('Location:index.php');
}
