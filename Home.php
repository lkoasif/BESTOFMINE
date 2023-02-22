<?php
include 'oops_method.php';
$obj =new Scrawl();
$get_record=$obj->displayRecords();
$obj->scraping_data();


?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" href="/favicon.png" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://dailynewshighlights.com/assets-v2/css/style.css?v=3.0.1" />
<link rel="stylesheet" href="https://dailynewshighlights.com/css/reset.css?v=3.0.1" />
<link rel="stylesheet" href="https://dailynewshighlights.com/css/style.css?v=3.0.1" />


</head>
<body>
<div class="card-bottom">
<div class="row">
<div class="col-7">
<p class="new-category">
<a  href="https://dailynewshighlights.com/sports" title="Sports">
Sports
</a>
</p>
</div>
</div>
</div>

<?php
while($row=$get_record->fetch_assoc()){
    
    ?>
    
<div class="card common-card  card-block-small col-lg-3 mt-4" news_card="257367">
<div class="card-horizontal">
<div class="img-square-wrapper">
<a href="<?php echo $row['title']?>" target="_blank" title="<?php echo $row['title'] ?>"  
                height: 0;
                padding-bottom: 53%;
                ">
<img class="img-fluid" src="<?php echo $row['image_url']?>" >
</a>
</div>
<h4 class="card-title">
<a href="" target="_blank"  title="<?php echo $row['title']?>"><?php echo $row['title'];
?>
</a>
</h4>
</div>
</div>

<div class="user-status">
<div class="row">
<div class="col-4">
<p class="time-stamp">
<?php echo $obj->getTimeDifference($row['post_date'])?>
</p>
</div>

</div>
</div>
</div>
</div>
<?php
}
?>
</body>
</html>