<?php
include 'oops_method.php';
$obj =new Scrawl();
$get_record=$obj->displayRecords();

//$obj->getTimeDifference($date);


?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewpart" content="width=device=width",initial-scale=1.0">
<title>DAILY NEWS </title>
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

<div class ="container">
 <div class ="logo-wrapper  d-flex align-items-center">
    <h3 ><a  href="" >DAILY NEWS HEADLINES</a></h3>  
</div>

<div class ="container-fluid menu">
    <div class="container">
        <div class="d-flex menu-items">
            
			<div>
                <a href= "listing.php">Sports</a>
				</div>
				
        </div>
		</div>
    </div>
	<?php
while($row=$get_record->fetch_assoc()){
    
    ?>
	<div class="container main-news section">
	   <div class="row" align='center'>
	   <div class=" col-md-20  ">
       
       <img class="thumb mb-10  col-lg-6 mt-4 " src="<?php echo $row['image_url']?>" >
       <h5>
        <a href=""> <?php echo str_replace('\n\n','',$row['title']); ?>
       </h5>
       <p class="time-stamp">
            <?php echo $obj->getTimeDifference($row['post_date'])?>
</p>   
</div>
<?php
}
?>
</body>
</html>
