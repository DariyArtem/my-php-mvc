<?$this->render('header')?>
<?$result = $this->getUser();?>
 <div class="container">
        <a href="../home">
            <button class="button" type="button">Homepage</button>
        </a>
    </div>
    <div class="container">
            <div class="row" >
                <div class="col" style="font-size: 30px">
                    Username - <?php echo $result["username"];?>
                </div>

            </div>
            <div class="row" >
                <div class="col" style="font-size: 30px">
                    Email - <?php echo $result["email"]?>
                </div>
            </div>
            <br>
    </div>
<br>
    <div class="container">
<h2><?php echo $result["username"]?>'s Uploads</h2>
    </div>
<?php $results = $this->getSomebodyUploads();
foreach ($results as $img):?>
<div class="container">
    <div class="row">
        <div class="col">
            <img class="db-img" src="../../<?php echo $img["image"]; ?>">
        </div>
    </div>
</div>
<?endforeach;
$this->render('footer')?>