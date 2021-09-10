<?php

    session_start();
    if (isset($_SESSION["auth"]) && $_SESSION["auth"] !== true ){
        header('Location: login.php');
    }
    $id = $_SESSION['user']['id'];

    require_once 'assets/config.php';

    if(isset($_GET['del'])){

        $image = $_GET['del'];

        $query = "DELETE  FROM images WHERE image = '$image'";

        mysqli_query($induction, $query) or die(mysqli_error($induction));
        unlink('assets/'.strval($image));
        header('Location: profile.php');

    }

    $result = mysqli_query($induction, "SELECT * FROM `images` WHERE `userid` = $id");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title><?= $_SESSION["user"]["username"]?>'s profile</title>
</head>
<body>

<form action="assets/logout.php">
<div class="container">

    <button class="button" type="submit">
        <a>Log out</a>
    </button>
    <a href="homepage.php">
        <button class="button" type="button">Homepage</button>
    </a>

</div>
</form>
<div class="container" >
    <div class="row " >
        <div class="col" style="font-size: 30px">
            Username - <?= $_SESSION["user"]["username"]?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="font-size: 30px">
            Email - <?= $_SESSION["user"]["email"]?>
        </div>
    </div>
    <br>
    <form action="assets/upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input  type="file" name="file">
        <br>
        <input class="button" type="submit" name="submit" value="Upload" style="margin-top: 10px;">
        <?php
        if (isset($_SESSION['is_error']) && $_SESSION['is_error'] === true){
            ?>
            <div class="alert">
                <?= $_SESSION['error_msg'] ?>
            </div>
            <?php
        }
        unset($_SESSION['is_error']);
        unset($_SESSION['statusMsg']);

        ?>

        <?php
        if (isset($_SESSION['is_success']) && $_SESSION["is_success"] === true){
            ?>
            <div class="alert-success">
                <?= $_SESSION['success_msg']?>
            </div>
            <?php
        }
        unset($_SESSION['is_success']);
        unset($_SESSION['success_msg']);
        ?>
    </form>

</div>

<div class="container">
    <h2>Your Uploads</h2>
    <?php
        while ($img = mysqli_fetch_assoc($result)){
            ?>
                <div class="row">
                    <div class="col-sm uploads">
                        <img class="db-img" src="assets/<?= $img['image']?>">
                        <a href="?del=<?= $img['image']?>">
                            <button class="button delete" type="button">Delete</button>
                        </a>
                    </div>
                </div>

        <?php
    }
    ?>
</div>
</body>
</html>