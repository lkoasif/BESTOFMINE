<?php
use Gt\Dom\HTMLDocument;
require './vendor/autoload.php';
//include ('html.php');
$url = "https://dailynewshighlights.com/sports";
$html_codes = file_get_contents($url);
//echo $html_codes;
$document = new HTMLDocument($html_codes);
$num = 1;
foreach (
    /*$document->querySelectorAll('.card-title') as $h4 
)
{
    echo "\n $num:" . $h4->innerText;
    $num++;
}*/
   $document->querySelectorAll('.img-fluid') as $a)

{
    echo "\n $num:<br>" . $a->src;
 $num++;
}










?>