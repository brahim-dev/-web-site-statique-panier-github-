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
  	header("location: signup.php");
  }

  	// Si pas de "compteur.txt"... le créer
	if(!file_exists("compteur.txt")){ 
		$compteur=fopen("compteur.txt","w");
		$hit=1;	// Initialise a 1
		// Cree le COOKIE
		setcookie("Visite","ok",time()+365*24*3600); // 1 an
	}
	else{
			// Stocke les visites dans $hit
			$compteur=fopen("compteur.txt","r+");
			$hit=fgets($compteur,255);
			$hit++;
			// Si pas de COOKIE...
			if(empty($_COOKIE["Visite"])){
				// Cree le COOKIE
				setcookie("Visite","ok",time()+365*24*3600); // 1 an
				// Incremente $hit
				$hit++;
			}
	}
	// Ecrit la valeur de $hit dans "compteur.txt"
	fseek($compteur,0);
	fputs($compteur,$hit);
	fclose($compteur);
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
                     <?php getSlider(); ?>
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
	getProduct();

	?>
				<!-- /Product Single -->
			</div>
			<!-- /row -->


		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

<?php include $tpl. 'footer.php' ?>
