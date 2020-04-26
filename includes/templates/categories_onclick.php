
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">

				<div class="pull-center">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a style="color: #181a21" href="#">English (ENG)</a></li>
								<li><a style="color: #181a21" href="#">Russian (Ru)</a></li>
								<li><a style="color: #181a21" href="#">French (FR)</a></li>
								<li><a style="color: #181a21" href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a style="color: #181a21" href="#">USD ($)</a></li>
								<li><a style="color: #181a21" href="#">EUR (€)</a></li>
								<li><a style="color: #181a21" href="#">MAD (Dh)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="layout/img//logo.png" alt=""> </a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">Cosmetics products</option>
								<option value="2">NATURALSOAPS PRODUCTS</option>
								<option value="3">Argan oil</option>
								<option value="4">NATURAL plants</option>
								<option value="5">Parfumes</option>
								<option value="6">Home food</option>
								<option value="7">cosmetics oils</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon"> <i class="fa fa-user-o"></i></div>
								<?php  if (isset($_SESSION['username'])) : ?>
							    	<strong class="text-uppercase">
							    		<?php echo $_SESSION['username']; ?>
							    	</strong>
							    
							</div>		
							    <ul class="custom-menu" style="width: 250px">
							    	<li><a href="#"><i class="fa fa-heart-o"></i> My BAGA </a></li>
									<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist </a></li>
									<li><a href="#"><i class="fa fa-heart-o"></i> My Orders </a></li>
									<li><a href="#"><i class="fa fa-heart-o"></i> Notifications </a></li>
									<li><a href="index.php?logout='1'"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
								</ul>

							<?php elseif(!isset($_SESSION['username'])): ?>
							    	<strong class="text-uppercase">
							    		<?php echo 'LOGIN' ;?>
							    	</strong>
							</div>		
							    <ul class="custom-menu" style="width: 250px">
									<li><a href="signup.php"><i class="fas fa-plus"></i> Login</a></li>
									<li><a href="signup.php"><i class="fas fa-plus"></i> Create Account</a></li>
								</ul>
							    <?php endif ?>
						</li>
						<!-- /Account -->

							<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty"><?php echo count($_SESSION['cart']);?></span>
								</div>
								
								<strong class="text-uppercase">CART (<?php echo count($_SESSION['cart']);?>)</strong>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
									<?php
								foreach($_SESSION['cart'] as $product){
								$pro_id = $product['id'];
								$img = $product['img1'];
								$pro_title = $product['title'];
								$pro_price = $product['price'];
								?>
									<form action="cart.php" method="post" enctype="multipart/form-data">
					                 
									 <div class="product product-widget">
										 <div class="product-thumb">
											 <img src="<?php echo $img; ?>"  alt="">
										 </div>
										 <div class="product-body">
											 <h3 class="product-price">$ <?php echo $pro_price; ?> x 1</h3>
											 <h2 class="product-name"><a href="product-page.php?pro_id=<?php echo $pro_id;?>"><?php echo $pro_title; ?></a></h2>
										 </div>
										 <input type="hidden" name="remove" value="<?php echo $pro_id; ?>">
										 <button type="submit" name="delete" class="cancel-btn"><i class="fa fa-trash"></i></button>
									 </div>
									 </form>
									  <?php }  ?>

									</div>
									<div class="shopping-cart-btns">
										<a href="cart.php"><button class="main-btn">View Cart</button></a>
										<a href="cart.php"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->


	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categories <i class="fas fa-angle-down"></i></span>
					<ul class="category-list">
					<?php getCats(); ?>
						<li><a href="products.php">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Shops</a></li>
                        <li><a href="download.php?file=rapport-youssefainane-brahimbenlhoucine.pdf"><i class="fa fa-download">Telecharger Rapport</i></a></li>
						<li><a href="commentaire.php">Form/commentaires</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="products.php">Products</a></li>
								<li><a href="cart.php">Cart</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	