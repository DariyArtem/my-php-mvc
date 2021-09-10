
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title><?= $user['username'];?>'s profile</title>
</head>
<body>

    <div class="container">
        <a href="homepage.php">
            <button class="button" type="button">Homepage</button>
        </a>
    </div>
    <div class="container">
            <div class="row" >
                <div class="col" style="font-size: 30px">
                    Username - <?= $user['username'];; ?>
                </div>

            </div>
            <div class="row" >
                <div class="col" style="font-size: 30px">
                    Email - <?= $user['email']; ?>
                </div>
            </div>
            <br>
    </div>
<br>
    <div class="container">
<h2><?= $user['username'];?>'s Uploads</h2>

        <?php
        while ($img = mysqli_fetch_assoc($result)){
            ?>


                        <div class="row">
                            <div class="col-sm">
                                <img class="db-img" src="assets/<?= $img['image']?>">
                            </div>
                        </div>



            <?php
        }
        ?>
    </div>
</body>
</html>