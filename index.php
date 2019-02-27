<?php
session_start();
require_once "connection.php";
$sql="SELECT * from tbl_login";
$result=mysqli_query($conn,$sql);

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
<h1 style="text-align: center"><i class="glyphicon glyphicon-user">
    </i> Login Form</h1>
<hr style="height:1px;border:none;color:#333;background-color:#333;" >

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="loginaction.php" method="post">
            <h2>Add record</h2>
            <hr>
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
                <hr>
            <div class="form-group">

                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male" >Male &emsp;
                <input type="radio" name="gender" value="female">Female
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control">
                    <option value="Nepal">Nepal</option>
                    <option value="China">China</option>
                    <option value="India">India</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Display Record</h2>
                <hr >
                <table class="table table-striped" >
                    <tr>
                        <th>S.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Action</th>
                    </tr>
                    <?php $i=1 ; while($test=mysqli_fetch_assoc($result)):?>
                    <tr>
                        <td><?=$i ;?></td>
                        <td><?php echo $test['name'];?></td>
                        <td><?php echo $test['email'];?></td>
                        <td><?php echo $test['gender'];?></td>
                        <td><?php echo $test['country'];?></td>
                        <td><a href="delete.php?id=<?=$test['id'];?>" class="btn btn-danger btn-sm" >Delete</a>
                        <a href="edit.php?id=<?=$test['id'];?>" class="btn btn-success btn-sm">Edit</a> </td>                    </tr>
                    <?php  $i++; endwhile; ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>