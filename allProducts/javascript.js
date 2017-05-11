$(document).ready(function (){
  $("#main_content").slideDown();
  $(".custome-upload-btn").click(function(){
    $(this).prev().click();
  });

  $(".nav-home").click(function(){
    $(".log_div").slideUp();
    $("#main_content").slideDown();
  });

  $(".delete").click(function(){
    var id = $(this).parents(".item").find(".prod_id").text();
    //alert(id);
    var node = $(this);
    $.ajax({
            url: "addProduct.php",
            type: "POST",
            datatype: "JSON",
            data: {
                req: "del",
                value: id
            },
            success: function (data) {
              console.log(data);
                $(node).parents(".item").fadeOut(1000);
            }
        });
  });

  $(".trans-log").click(function(){
    //var id = $(this).parents(".item").find(".prod_id").text();
    //alert(id);
    $(".log_div").remove();
    $.ajax({
            url: "tools.php",
            type: "GET",
            datatype: "JSON",
            data: {
                req: "log"
            },
            success: function (data) {
              //console.log(data);
              console.log(data);
              $(data + "").insertBefore("#main_content");
              $("#main_content").slideUp();
              $(".log_div").slideDown();
            }
        });
  });

  $(".edit").click(function(){
    $(".update_product_div").remove();
    console.log($(this).parents(".item").find("span#qtty").text());
    var id = $(this).parents(".item").find(".prod_id").text();
    $('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 update_product_div">\
			<form action="addProduct.php" method="post" enctype="multipart/form-data">\
      <input id="currentID" type="hidden" value="' + id + '" name="currentID">\
        <div class="input-div name-div">\
          <label for="id">Product ID:</label>\
          <input id="id" type="text" value="' + id + '" name="id">\
        </div>\
        <div class="input-div category-div">\
          <label for="name">Product Name:</label>\
          <input id="name" type="text" value="' + $(this).parents(".item").find(".item_title").text() + '" name="name">\
        </div>\
        <div class="input-div price-div">\
          <label for="price">Price: </label>\
          <input id="price" type="number" value="' + $(this).parents(".item").find(".price").find("span").text() + '" name="price" step="0.01">\
        </div>\
				<div class="input-div price-div">\
          <label for="qtty">Quantity: </label>\
          <input id="qtty" type="number" value="' + $(this).parents(".item").find("span#qtty").text() + '" name="qtty" step="1">\
        </div>\
				<div class="input-div submit-div">\
          <input id="update-submit" type="submit" name="submit" value="Update">\
        </div>\
      </form>\
		</div>').insertBefore("#main_content");
    $("#main_content").slideUp();
    $(".update_product_div").slideDown();

  });
});
