<?php
define("VENDOR", "X-Products");
$connStr =
        'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
        'Dbq=D:\\wamp64\\www\\IS362\\Project\\ecommerce2\\products.accdb';

$db = new PDO($connStr);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
