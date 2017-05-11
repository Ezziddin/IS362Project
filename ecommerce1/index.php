<?php
require_once("dbconnect.php");
require_once("tools.php");

    $q = $db->query("SELECT * FROM products");
    $products = "";
    while($row = $q->fetch()){
            $products .= printProduct($row);
    }

function printProduct($row){
	return '
	<div class="item">
				<div class="product_info">
          <span class="price">$<span>'. $row["Price"] .'</span></span>
					<span class="category">' . VENDOR . '</span>
					<h1 class="item_title">'. $row["ProdName"] .'</h1>
					<span class="prod_id">'. $row["xProdID"] .'</span>
					<p class="product_description">Many desktop publishing packages
						and web page editors </p><span class="qtty"> Qtty: </span>
						<span id="qtty" class="qtty">'. $row["Qtty"] .'</span>
					<div></div>
					<a class="more-info link-btn" href="#" target="_blank">Info</a>
				</div>
        <div class="functions">
          <span class="edit"></span>
          <span class="delete"></span>
        </div>
			</div>';
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Responsive Webshop Model">
<meta name="keywords" content="HTML, CSS, XML, JavaScript">
<meta name="author" content="Anis Koubaa">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jarir Bookstore</title>
<link rel="stylesheet" href="fonts.css">
<link rel="stylesheet" href="shop.css">
<link rel="stylesheet" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="javascript.js"></script>
</head>
<body>
		<div id="header"
			class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header"><img class="img-banner" src="images/webshop-banner.jpg"
				alt="webshop banner" />
			<h1 class="banner_text"><?=  VENDOR ?></h1>
		</div>

		<div id="menu" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu">
			<ul class="bg">
				<li><a class="nav-add-prod" href="#">Home</a></li>
				<li><a class="nav-home" href="#">Add Product</a></li>
			</ul>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 add_product_div">
			<form action="addProduct.php" method="post" enctype="multipart/form-data">
        <div class="input-div name-div">
          <label for="id">Product ID:</label>
          <input id="id" type="text" name="id">
        </div>
        <div class="input-div category-div">
          <label for="name">Product Name:</label>
          <input id="name" type="text" name="name">
        </div>
        <div class="input-div price-div">
          <label for="price">Price: </label>
          <input id="price" type="number" name="price" step="0.01">
        </div>
				<div class="input-div price-div">
          <label for="qtty">Quantity: </label>
          <input id="qtty" type="number" name="qtty" step="1">
        </div>
				<div class="input-div submit-div">
          <input id="submit" type="submit" name="submit" value="Add">
        </div>
      </form>
		</div>
    <div id="main_content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?=  $products ?>
		</div>
		<div id="footer"
			class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer">&copy;
			<?=  VENDOR ?>, 2016</div>

</body>
</html>
