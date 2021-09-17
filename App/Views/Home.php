<?$this->render('header')?>
<div class="container">
    <form action="home/logout">
        <div>
            <button class="button" type="submit">
                <a>Log out</a>
            </button>
            <a href="../profile">
                <button class="button" type="button">Profile</button>
            </a>
        </div>
    </form>
</div>
<div class="container">
    <p>Here is uploads of all time
        <br>
        Be careful: every time you refresh this page all photos will be display randomly!
    </p>
</div>
<?php $results = $this->getAllUploads();

foreach ($results as $img):
    $postid = $img["id"];
    $total_likes = $this->countTotalLikes($postid);
    $total_dislikes = $this->countTotalDislikes($postid);
    $type = $this->checkUserStatus($postid);

    ?>
    <div class="container" >
        <div class="row">
            <div class="col">
                <a href="../profiles?id=<?php echo $img['userid'];?>">
                    <img class="db-img" src="../../<?php echo $img["image"]; ?>">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php
                if($_SESSION["auth"] === true) {
                ?>

                <input type="submit" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />
                &nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;
                <input type="submit" value="Dislike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #lightseagreen;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_dislikes; ?></span>)

            </div>
            <?php
            }
            ?>
        </div>
<?php endforeach;
$this->render('footer');?>
