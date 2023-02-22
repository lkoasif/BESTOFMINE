<?php
use Gt\Dom\HTMLDocument;
use Gt\Dom\HTMLElement\HTMLSpanElement;

class Scrawl {

private $servername='localhost';
private $username='root';
private $password='';
private $database='Scrawling';
public mysqli $conn;
public function __construct()
{
  $this->conn=new mysqli($this->servername,$this->username,$this->password,$this->database) ;
   if($this->conn->connect_error){
 echo "connected failed";

   }else{
    //return $this->conn;

 //echo "connected";


   }


}// constructor  close

public function check_existdata($title,$img,$date){
    $sql="select * from image_title where title=? or image_url=? or post_date=? ";
    // prepare statement
    $statement = $this->conn->prepare($sql);
    $statement->bind_param('sss', $title, $img, $date);
    $statement->execute();
    $result = $statement->get_result();
    // var_dump($result->num_rows);

  // while($row = $result->fetch_assoc()) 
  //

  // }
  //  $result=$this->conn->query($sql);
   //print_r($result);
   if($result->num_rows)
   {
    return true;	
   }

    $sql="INSERT INTO image_title(title,image_url,post_date) VALUES (?, ?, ?)";
    $statement = $this->conn->prepare($sql);
    $statement->bind_param('sss', $title, $img, $date);
    $statement->execute();
    
    Return $statement->get_result();
    
     
}

/*public function  displayRecords(){
 //$sql="select * from image_title where title=? or image_url=? or post_date=? ";
 $statement = $this->conn->prepare($sql);
 $statement->bind_param('sss'$statement);
 $statement->execute();
 $result = $statement->get_result();
 if($result->num_rows)
 {
  return true;	
 }


}*/
public function displayRecords(){
 $sql="select * from image_title order by post_date desc";
  $result=$this->conn->query($sql);
  if($result->num_rows>0){
    return $result;

}
}

public function getTimeDifference($time) {
  //Let's set the current time
  $currentTime = date('Y-m-d H:i:s');
  $toTime = strtotime($currentTime);

  //And the time the notification was set
  $fromTime = strtotime($time);

  //Now calc the difference between the two
  $timeDiff = floor(abs($toTime - $fromTime) / 60);

  //Now we need find out whether or not the time difference needs to be in
  //minutes, hours, or days
  if ($timeDiff < 2) {
      $timeDiff = "Just now";
  } elseif ($timeDiff > 2 && $timeDiff < 60) {
      $timeDiff = floor(abs($timeDiff)) . " minutes ago";
  } elseif ($timeDiff > 60 && $timeDiff < 120) {
      $timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
  } elseif ($timeDiff < 1440) {
      $timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
  } elseif ($timeDiff > 1440 && $timeDiff < 2880) {
      $timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
  } elseif ($timeDiff > 2880) {
      $timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
  }

  return $timeDiff;
}

public function scraping_data()
{
//use Gt\Dom\HTMLDocument;
require './vendor/autoload.php';
$obj=new Scrawl();
//include ('html.php');
$url = "https://dailynewshighlights.com/sports";
$html_codes = file_get_contents($url); 
//echo $html_codes;
$document = new HTMLDocument($html_codes);
$news_cards = $document->querySelectorAll('.card');
echo "crawling....<br>";
foreach($news_cards as $card)
{
    $title = $obj->conn->real_escape_string($card->querySelector('.card-title')->innerText);
     $img = $obj->conn->real_escape_string($card->querySelector('.img-fluid')->src);

     $time = $card->querySelector('.time-stamp')->innerText;
    $date= $obj->conn->real_escape_string(date('Y-m-d H:i:s', strtotime($time)));
  $fetch_record=$obj->check_existdata($title,$img,$date);
  if($fetch_record){

   
 
 }
}
}
}

?>






