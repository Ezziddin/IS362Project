<?php
require_once("dbconnect.php");
require_once("tools.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['req'])){
      if($_POST["req"] == "del"){
        $q = $db->query("DELETE FROM products WHERE xProdID='{$_POST["value"]}';");
        $obj = array('type' => 'delete', 'prodID' => "{$_POST["value"]}");
        sendCurl(json_encode($obj));
      }
    }

    if(isset($_POST['submit']))
    {
      if($_POST['submit'] == "Add"){

        $q = $db->query("INSERT INTO products ".
        "VALUES ('{$_POST["id"]}', '{$_POST["name"]}', '{$_POST["price"]}', '{$_POST["qtty"]}')");
        $obj = array('type' => 'insert',
        'product' => array('prodID' => "{$_POST["id"]}",
            'name' => "{$_POST["name"]}",
            'price' => "{$_POST["price"]}",
            'qtty' => "{$_POST["qtty"]}"));
        sendCurl(json_encode($obj));
        header("location: index.php");

      } else if($_POST['submit'] == "Update"){
        $currentID =  $_POST["currentID"];
        $id =  $_POST["id"];
        $name =  $_POST["name"];
        $price =  $_POST["price"];
        $qtty =  $_POST["qtty"];
        $q = $db->query("UPDATE products ".
        "SET xProdID='$id', ProdName='$name', Price='$price', Qtty='$qtty' WHERE xProdID='$currentID'");
        $obj = array('type' => 'update',
        'product' => array('currentID' => "{$_POST["currentID"]}",
            'prodID' => "{$_POST["id"]}",
            'name' => "{$_POST["name"]}",
            'price' => "{$_POST["price"]}",
            'qtty' => "{$_POST["qtty"]}"));
        sendCurl(json_encode($obj));
        header("location: index.php");
      }

    }
}

?>
