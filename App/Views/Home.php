<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/4d1ce4c9a9.js" crossorigin="anonymous"></script>
	<title><?=$view?></title>
</head>

<body>

<div class="container">
    <form action="assets/logout.php">
        <div >
            <button class="button" type="submit">
                <a>Log out</a>
            </button>
        </div>
    </form>
</div>
<div class="container">
    <p>Here is uploads of all time
        <br>
        Be careful: every time you refresh this page all photos will be display randomly!
    </p>
</div>
<div class="container">

</div>

</body>
</html>