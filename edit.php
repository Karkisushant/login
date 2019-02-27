<?php
session_start();
require_once 'connection.php';
if(!empty($_GET['id']) &&  $_SERVER['REQUEST_METHOD']=='GET')
{
    if((int)$_GET['id'])
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_login WHERE id=".$id;
        $result = mysqli_query($conn,$sql);
        $userdata = mysqli_fetch_assoc($result);

    }
    else
    {
        $_SESSION['error']='Invalid ID';
        header('Location:index.php');
    }
}
else
{
    $_SESSION['error']="Invald access";
    header('Location:index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../login/Bootstrap/css/bootstrap.css">
</head>
<body>
<form action="Editaction.php" method="post">
    <input type="hidden" name="id" value="<?=$userdata['id']?>">
    <h1 style="text-align: center"><i class="glyphicon glyphicon-edit">
        </i>Edit Record</h1>

    <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger">

            <?=$_SESSION['error']?>
            <?php unset($_SESSION['error'])?>
        </div>
    <?php endif;?>
    <?php if(isset($_SESSION['success'])):?>
        <div class="alert alert-success">

            <?=$_SESSION['success']?>
            <?php unset($_SESSION['success'])?>

        </div>
    <?php endif;?>
    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
    <div class="col-md-6">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=$userdata["name"]?>" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?=$userdata["email"]?>" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" <?=$userdata["gender"]=='male' ? 'checked' : ''?>  value="male" >Male &emsp;
        <input type="radio" name="gender"  <?=$userdata["gender"]=='female'? 'checked' : ''?> value="female">Female
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select name="country" id="country" class="form-control">
            <option value="Nepal" <?=$userdata["country"]=='Nepal' ? 'selected' : ''?> >Nepal</option>
            <option value="China" <?=$userdata["country"]=='China' ? 'selected' : ''?>>China</option>
            <option value="India" <?=$userdata["country"]=='India' ? 'selected' : ''?>>India</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Edit</button>

    </div>
    </div>

</form>
</body>
</html>
