<?php
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
  // {

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
}

use Gt\Dom\HTMLDocument;
require './vendor/autoload.php';
$obj=new Scrawl();
//include ('html.php');
$url = "https://dailynewshighlights.com/sports";
$html_codes = file_get_contents($url); 
//echo $html_codes;
$document = new HTMLDocument($html_codes);
$news_cards = $document->querySelectorAll('.card');
//echo"<pre>";
//print_r($news_cards);
foreach($news_cards as $card)
{
   //$web_url=$obj->conn->real_escape_string($card->querySelector('.card-title')->href);
   $title = $obj->conn->real_escape_string($card->querySelector('.card-title')->innerText);
   $img = $obj->conn->real_escape_string($card->querySelector('.img-fluid')->src);

    $time = $card->querySelector('.time-stamp')->innerText;
    // echo trim($time);
    echo $oneHourAgo = date('Y-m-d H:i:s', strtotime($time));
    // exit;




  // $date= date('Y-m-d H:i:s', strtotime($time));
    $date= $obj->conn->real_escape_string(date('Y-m-d H:i:s', strtotime($time)));
  //$date =$obj->conn->real_escape_string($oneHourAgo);
  $fetch_record=$obj->check_existdata($title,$img,$date);
  //print_r($fetch_record);
  if($fetch_record){

   
 //echo "inserted record  data";
 }else{

    //echo "not inserted record ";

 }
 
}

?>






