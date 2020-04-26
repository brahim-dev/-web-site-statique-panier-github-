<?php include 'init.php'; ?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {

  }
  else if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signup.php");
  }
?>

<?php include $tpl.'header.php' ?>
<?php include $tpl.'categories_onclick.php' ?>
<?php 
$products=""; 
$err="";
if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $product){
	$products.=$product['title'];

}
if(isset($_POST['pay'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$adresse=$_POST['address'];
	$zipcode=$_POST['zip-code'];
	$phone=$_POST['tel'];
	if(!empty($name)&&!empty($email)&&!empty($adresse)&&!empty($zipcode)&&!empty($phone)){
		addOrder($_SESSION['client_id'],$name,$email,$adresse,$zipcode,$phone,$products,$_SESSION['prixttl']);
		echo "<script>alert('order placed')</script>";
		foreach($_SESSION['cart'] as $key=>$product){
				 unset($_SESSION['cart'][$key]);	 
		}
	}else{
		$err="all required";
	}
}
}

?>
	

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

<!-- section -->
	<div class="section" style="margin-bottom: 100px">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form method="post" action="cart_checkout.php" id="checkout-form" class="clearfix" style="text-align: center">
				<?php echo $err; ?>
					<div class="col-md-12">
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<div class="form-group contact_us">
								<input class="input full" type="text" name="name" placeholder="Name" value=<?php echo $_SESSION['username']; ?> required>
							</div>
							<div class="form-group contact_us">
								<input class="input full" type="email" name="email" placeholder="Email" value=<?php echo $_SESSION['client_email']; ?> required>
							</div>
							<div class="form-group contact_us">
								<input class="input full" type="text" name="address" placeholder="Address" required>
							</div>
							<div class="form-group contact_us">
								<input class="input half" type="text" name="zip-code" placeholder="ZIP Code" required>
								<input class="input half" type="tel" name="tel" placeholder="Telephone" value=<?php echo $_SESSION['phone']; ?> required>
							</div>
							<button class="primary-btn" name="pay" type="submit" style="width: 245px;margin-right: 6px;"><i class="fa fa-money"></i> Order Now</button>
							
				</div>
			</form>
			</div></div></div>














<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<a href="product-page.php"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
							<img src="layout/img/product04.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="product-page.php">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
							</div>
							<a href="product-page.php"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
							<img src="layout/img/product03.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="product-page.php">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<a href="product-page.php"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
							<img src="layout/img/product02.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="product-page.php">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<a href="product-page.php"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button></a>
							<img src="layout/img/product01.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="product-page.php">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->



	<?php include $tpl.'footer.php' ?>
