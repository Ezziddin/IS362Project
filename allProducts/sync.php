<?php
require_once("dbconfig.php");
// Begin testing 
/*
$obj = array('type' => 'insert',
        'product' => array('prodID' => "t100",
            'name' => "iPad",
            'price' => "2399",
            'qtty' => "1999"));

$obj = json_encode($obj);
$obj = json_decode($obj);
echo $obj->product->qtty;
insertProduct($obj->product);
*/
// End Testing

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $txt = "I am in     ";
    $myfile = fopen("testfile.txt", "w");
    $obj = json_decode($_POST["JSON"]);
    $txt .= "{$_POST["JSON"]}\n {$_POST["vendor"]} ";
    switch ($obj->type){
        case 'update':
            updateProduct($obj->product);
            $txt .= "update";
            break;
        case 'delete':
            deleteProduct($obj->prodID);
            $txt .= " delete";
            break;
        case 'insert':
            insertProduct($obj->product);
            $txt .= " insert";
            break;
        default:
            break;
        }
} else{
    $txt = "I am out     ";
}

fwrite($myfile, $txt);
fclose($myfile);

function updateProduct($prod){
    $currentID = $prod->currentID;
    $id = $prod->prodID;
    $name = $prod->name;
    $price = $prod->price;
    $supplier = $_POST["vendor"];
    $q = $GLOBALS["db"]->query("UPDATE products ".
    "SET ID='$id', ProdName='$name', Price='$price', Supplier='$supplier' WHERE ID='$currentID' AND Supplier='$supplier'");
    logTransaction($id, 'update');
    header("location: index.php");
}

function insertProduct($prod){
    $id = $prod->prodID;
    $name = $prod->name;
    $price = $prod->price;
    $supplier = $_POST["vendor"];
    $q = $GLOBALS["db"]->query("INSERT INTO products ".
    "VALUES ('$id', '$name', '$supplier', '$price')");
    logTransaction($id, 'insert');
    header("location: index.php");
}

function deleteProduct($id){
    $q = $GLOBALS["db"]->query("DELETE FROM products WHERE ID='$id' AND Supplier='{$_POST["vendor"]}'");
    logTransaction($id, 'delete');
}

function logTransaction($id, $type){
    $supplier = $_POST["vendor"];
    $q = $GLOBALS["db"]->query("INSERT INTO tran ".
    "VALUES ('{$_POST["JSON"]}', Current_Timestamp, '$supplier', '$id', '$type')");
}

?>