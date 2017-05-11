<?php

function sendCurl($json){
  //$xmlcontent = "Hi there";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_URL, "http://localhost/IS362/Project/allProducts/sync.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "JSON=".$json."&vendor=" . VENDOR);
  $content=curl_exec($ch);
}

?>
