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
    <title>Cure Your Problems</title>


    <link rel="stylesheet" href="css/normalize.css">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/style.css">
	
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/styleLogin.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

</head>

<body>

    <div class="page">
        <span class="menu_toggle">
    <i class="menu_open fa fa-bars fa-lg"></i>
    <i class="menu_close fa fa-times fa-lg"></i>
  </span>
        <ul class="menu_items">
            <li><a href="cure.html"><i class="icon fa fa-signal fa-2x"></i> CURE</a></li>
            <li><a href="scripts.html"><i class="icon fa fa-signal fa-2x"></i> SCRIPTS</a></li>
            <li><a href="dolls.html"><i class="icon fa fa-signal fa-2x"></i> DOLLS</a></li>
            <li><a href="services.html"><i class="icon fa fa-heart fa-2x"></i> SERVICES</a></li>
            <li><a href="story.html"><i class="icon fa fa-coffee fa-2x"></i> STORIES</a></li>

        </ul>
		
		<header role="banner">

		<nav class="main-nav">
			<ul>
				<!-- inser more links here -->
				<li><a class="cd-signin" href="#0">Sign in</a></li>
				<li><a class="cd-signup" href="#0">Sign up</a></li>
			</ul>
		</nav>
	</header>
	
        <main class="content">
            <div class="content_inner">

                                <div class="txt-heading">
                    <h1><a href="index.html"><img src="globe.gif" alt="home" width="60px" height="60px"/></a>THE CURES TO CURSE<a id="btnEmpty" href="shoppingcart.php"><img src="cart.png" alt="cart" align="right"/ height="50px" width="50px">{0}</h1></a>
                </div>



                <form method="post" action="cure.php?action=add&code=angelfeather">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/feather.png">
                                <img src="product-images/feather.png" alt="Angel Feather" width="300" height="200">
                            </a>
                            <div class="desc">Angel Feather
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

                <form method="post" action="cure.php?action=add&code=flame">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/flame.png">
                                <img src="product-images/flame.png" alt="Flame of Hell" width="300" height="200">
                            </a>
                            <div class="desc">Flame of Hell
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
                <form method="post" action="cure.php?action=add&code=horns">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/horns.png">
                                <img src="product-images/horns.png" alt="Devils Horns" width="300" height="200">
                            </a>
                            <div class="desc">Devils Horns
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
                <form method="post" action="cure.php?action=add&code=wind">
                    <div class="responsive">
                        <div class="img">
                            <a target="_blank" href="product-images/wind.png">
                                <img src="product-images/wind.png" alt="Wind of Paradise" width="300" height="200">
                            </a>
                            <div class="desc">Wind of Paradise
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


	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="#0">Sign in</a></li>
				<li><a href="#0">New account</a></li>
			</ul>

			<div id="cd-login"> <!-- log in form -->
				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" value="Login">
					</p>
				</form>
				
				<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->

			<div id="cd-signup"> <!-- sign up form -->
				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Username</label>
						<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Create account">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->

			<div id="cd-reset-password"> <!-- reset password form -->
				<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
			</div> <!-- cd-reset-password -->
			<a href="#0" class="cd-close-form">Close</a>



            </div>
					</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
			
        </main>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Gem jQuery -->



</body>

</html>
