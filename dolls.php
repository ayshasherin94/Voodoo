<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html>
<link href="style.css" type="text/css" rel="stylesheet" />



<head>
    <title>Voodoo Dolls</title>


    <link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="page">
        <span class="menu_toggle">
    <i class="menu_open fa fa-bars fa-lg"></i>
    <i class="menu_close fa fa-times fa-lg"></i>
  </span>
        <ul class="menu_items">
            <li><a href="cure.php"><i class="icon fa fa-signal fa-2x"></i> CURE</a></li>
            <li><a href="scripts.php"><i class="icon fa fa-signal fa-2x"></i> SCRIPTS</a></li>
            <li><a href="dolls.php"><i class="icon fa fa-signal fa-2x"></i> DOLLS</a></li>
            <li><a href="services.html"><i class="icon fa fa-heart fa-2x"></i> SERVICES</a></li>
            <li><a href="story.html"><i class="icon fa fa-coffee fa-2x"></i> STORIES</a></li>

        </ul>
        <main class="content">
            <div class="content_inner">

                              <div class="txt-heading">
                    <h1><a href="index.html"><img src="globe.gif" alt="home" width="60px" height="60px"/></a>VOODOO DOLLS<a id="btnEmpty" href="shoppingcart.php"><img src="cart.png" alt="cart" align="right"/ height="50px" width="50px">{<?php if(empty($_POST["quantity"])) {
    echo "0"; 
}else{
    echo $_POST["quantity"];} ?>}</h1></a>
                </div>



                <form method="post" action="shoppingcart.php?action=add&code=spellbook">

                <form method="post" action="shoppingcart.php?action=add&code=plaindoll">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/vo1.jpg">
                                <img src="product-images/vo1.jpg" alt="Plain Doll" width="300" height="200">
                            </a>
                            <div class="desc">Plain Doll
                                <br /> $1500.00
                                <br />
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Add to cart" class="btnAddAction" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" action="dolls.php?action=add&code=livingdoll">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/living.png">
                                <img src="product-images/living.png" alt="Living Doll" width="300" height="200">
                            </a>
                            <div class="desc">Living Doll
                                <br /> $1500.00
                                <br />
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Add to cart" class="btnAddAction" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="dolls.php?action=add&code=conjuringdoll">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/conj.jpg">
                                <img src="product-images/conj.jpg" alt="Conjuring Doll" width="300" height="200">
                            </a>
                            <div class="desc">Conjuring Doll
                                <br /> $1500.00
                                <br />
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Add to cart" class="btnAddAction" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="dolls.php?action=add&code=chuckydoll">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/chu.png">
                                <img src="product-images/chu.png" alt="Chucky Doll" width="300" height="200">
                            </a>
                            <div class="desc">Chucky Doll
                                <br /> $1500.00
                                <br />
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Add to cart" class="btnAddAction" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>

</html>
