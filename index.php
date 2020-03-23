<?php  session_start(); ?>
<?php include 'init.php'; ?>
<?php include 'includes/functions/productslist.php'; ?>
<?php 
 

  if(empty($_SESSION['cart'])){
	//initialisation 
  $_SESSION['cart'] = array();
}

  if (!isset($_SESSION['username'])) {

  }
  else if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

?>

<?php include $tpl.'header.php' ?>
<?php include $tpl.'categories.php' ?>

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					<div class="banner banner-1">
						<img style="height: 490px;" src="layout/img/banners/banner02.jpg" alt="">
						<div class="banner-caption">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF !</span></h1>
							<a href="product-page.php"><button class="primary-btn">Shop Now</button></a>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img style="height: 490px;" src="layout/img/banners/banner01.jpg" alt="">
						<div class="leftt">
							<h1 style="color: #ffc107;">ARGAN OIL</h1>
							<h3 style="color: #181a21; font-weight: 300px;">Up to 50% Discount</h3>
							<a href="product-page.php"><button class="primary-btn">Shop Now</button></a>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img style="height: 490px;" src="layout/img/banners/banner003.jpg" alt="">
						<div class="banner-caption">
							<h1 class="white-color">New Product <span>Collection</span></h1>
							<a href="product-page.php"><button class="primary-btn">Shop Now</button></a>
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="products.php">
						<img src="layout/img/banners/banner10.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-sm-6">
					<a class="banner banner-1" href="products.php">
						<img src="layout/img/banners/banner11.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 style="color: #000">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
					<a class="banner banner-1" href="products.php">
						<img src="layout/img/banners/banner12.jpg" alt="">
						<div class="banner-caption text-center">
							<h2 class="white-color">NEW COLLECTION</h2>
						</div>
					</a>
				</div>
				<!-- /banner -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- SIDE BUTTONS -->
	<div class="side">
		<a href="#" class="heart-icon">Your Favorites <i class="fas fa-heart"></i></a>
		<a href="cart.php" class="cart-icon">Your Cart <i class="fas fa-shopping-cart"></i></a>
		<a href="#" class="exchange-icon"> Compare <i class="fa fa-exchange"></i></a>
	</div>



	
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php
	foreach($products as $product){
		$pro_id = $product['id'];
		$pro_img1 = $product['img'];
		$pro_title = $product['title'];
		$pro_price = $product['price'];
		$pro_pricedd = $product['price']+10;
		echo "
                                
                 <div class='col-md-3 col-sm-6 col-xs-6'>
                <div class='product product-single'>
                  <div class='product-thumb'>
                    <div class='product-label'>
                      <span>New</span>
                      <span class='sale'>-20%</span>
                    </div>
                    <a href='product-page.php?pro_id=$pro_id'><button class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</button></a>
                    <img  src='$pro_img1'>
                  </div>
                  <div class='product-body'>
                    <h3 class='product-price'>$$pro_price<del class='product-old-price'>$$pro_pricedd</del></h3>
                    <div class='product-rating'>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star-o empty'></i>
                    </div>
                    <h2 class='product-name'><a href='product-page.php?pro_id=$pro_id'>$pro_title </a></h2>
                    <div class='product-btns'>
                      <button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
                      <button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
                      <button class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'><a href='product-page.php?pro_id=$pro_id'></a></i> Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
                                
                                ";
	}

	?>
				<!-- /Product Single -->
			</div>
			<!-- /row -->


		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php include $tpl. 'footer.php' ?>
