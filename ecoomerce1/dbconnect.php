<?php
define("VENDOR", "Jarir Bookstore");
$connStr =
        'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
        'Dbq=D:\\wamp64\\www\\IS362\\Project\\ecommerce1\\products.accdb';

$db = new PDO($connStr);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
