 <?php
 function pubMqtt($topic,$msg){
       $APPID= "demoremote/"; //enter your appid
     $KEY = "TPQJn54Iiz94BSj"; //enter your key
    $SECRET = "FfnPDBAAmHnQ86XqHsz9bBAPJ"; //enter your secret
    $Topic = "$topic"; 
      put("https://api.netpie.io/microgear/".$APPID.$Topic."?retain&auth=".$KEY.":".$SECRET,$msg);
 
  }
 function getMqttfromlineMsg($Topic,$lineMsg){
 
    $pos = strpos($lineMsg, ":");
    if($pos){
      $splitMsg = explode(":", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }else{
      $topic = $Topic;
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
  function put($url,$tmsg)
{
      
    $ch = curl_init($url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
      
    $response = curl_exec($ch);
    
      curl_close($ch);
      echo $response . "\r\n";
    return $response;
}
// $Topic = "ESP32";
 //$lineMsg = "CHECK";
 //getMqttfromlineMsg($Topic,$lineMsg);
?>
