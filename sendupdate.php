<?php

class sendupdate{
public function __construct(){

    $url = $_GET['URL'];
      
    $img = 'logo.png'; 
      
    // Function to write image into file
    file_put_contents($img, file_get_contents($url));
    

$text2 = '🌤️%a🌤️
🔸Ch: %b_%c
🔸Team: %d 
🔸 Download app(<a href=\'https://play.google.com/store/apps/details?id=com.mangasun.mangasun\'>گوگل پلی</a>)
    
 @mangasunofficial';

$text2 = str_replace("%a",$_GET['MANGA'] , $text2);
$text2 = str_replace('%b',$_GET['FIRST'],$text2);
$text2 = str_replace('%c',$_GET['LAST'] , $text2);
$text2 = str_replace("%d" , $_GET['TEAM'] , $text2);

    $chat_id    = "357849602";
    $bot_url    = "https://api.telegram.org/bot5430249703:AAEP3gm4eQ9FbeMPCn-JJfnYi340fatnV-g/";
    $url        = $bot_url . "sendPhoto?chat_id=" . $chat_id . "/sendMessage?text=hi&chat_id=357849602" ;
    
    $post_fields = array('chat_id'   => $chat_id,
        'photo'     => new CURLFile(realpath("./logo.png")) , 
        'caption'       => $text2 ,
        'parse_mode' => 'HTML'
    );
    //'<a href=\'url.com\'>word</a>'
    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:multipart/form-data"
    ));
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
    $output = curl_exec($ch);
    echo 'SUCCESS';
    
}


}

?>
