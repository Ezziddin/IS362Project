<?php
require_once("dbconfig.php");

if(isset($_GET["req"])){
  $q = $db->query("SELECT * FROM tran");
  $logs = '<div class="log_div col-lg-12 col-md-12 col-sm-12 col-xs-12"> ';
  while($row = $q->fetch()){
          $logs .= printTransLog($row);
  }
  $logs .= ' </div>';
  echo $logs;
}

function printTransLog($row){
  	return '
	<div class="item log_item">
				<div class="product_info">
					<span class="category ' . $row["Supplier"] . '">' . $row["Supplier"] . '</span>
					<p class="prod_id">Product ID: <b>'. $row["ID"] .'</b></p>
					<pre class="log_description">'. $row["Body"] .'</pre>
					<div></div>
          <p id="qtty" class="qtty">Date: <b>'. $row["Date"] .'</b></p>
				</div>
			</div>';
}


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
