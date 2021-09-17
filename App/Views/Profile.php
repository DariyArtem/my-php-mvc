<?$this->render('header')?>
<form action="profile/logout">
<div class="container">

    <button class="button" type="submit">
        <a>Log out</a>
    </button>
    <a href="../home">
        <button class="button" type="button">Homepage</button>
    </a>

</div>
</form>
<div class="container" >
    <div class="row " >
        <div class="col" style="font-size: 30px">
            Username - <?= $_SESSION["user"]["username"];?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="font-size: 30px">
            Email - <?=$_SESSION["user"]["email"];?>
        </div>
    </div>
    <br>
    <form action="profile/uploadImage" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input  type="file" name="file">
        <br>
        <input class="button" type="submit" name="upload" value="Upload" style="margin-top: 10px;">
    </form>
    <?
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
</div>
<div class="container">
    <h2>Your Uploads</h2>
</div>
<?php $results = $this->getUserUploads();
foreach ($results as $img):?>
    <div class="container" >
        <div class="row">
            <div class="col">
                <img class="db-img" src="../../<?php echo $img["image"]; ?>">
                <a href="profile/delete?id=<?echo $img["id"]?>">
                    <button class="button delete" type="button">Delete</button>
                </a>
            </div>
        </div>
    </div>
<?php endforeach;

$this->render('footer')?>