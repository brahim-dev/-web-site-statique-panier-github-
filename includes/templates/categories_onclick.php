
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
								$img = $product['img'];
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
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Cosmetics products<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<ul class="list-links">
									<li><h3 class="list-links-title">Categories</h3></li>
									<li><a href="products.php"> Natural face products</a></li>
									<li><a href="products.php"> Natural hand care products</a></li>
									<li><a href="products.php"> Natural body products</a></li>
									<li><a href="products.php"> Natural foot care products</a></li>
								</ul>
							</div>
						</li>
						<li><a href="products.php">Naturalsoaps products</a></li>
						<li><a href="products.php">Argan Oil</a></li>
						<li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Natural Plants <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<ul class="list-links">
									<li><h3 class="list-links-title">Categories</h3></li>
									<li><a href="products.php"> Argan plants</a></li>
									<li><a href="products.php"> Safran pur </a></li>
									<li><a href="products.php"> lavender</a></li>
									<li><a href="products.php"> medicated & aromatic plants</a></li>
								</ul>
							</div>
						</li>
						<li><a href="products.php">Parfumes</a></li>
						<li><a href="products.php">HOME food</a></li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Cosmetics Oils <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<ul class="list-links">
									<li><h3 class="list-links-title">Categories</h3></li>
									<li><a href="products.php"> Argan oil</a></li>
									<li><a href="products.php"> Olive oils</a></li>
									<li><a href="products.php"> Grain oil</a></li>
								</ul>
							</div>
						</li>
						<li><a href="products.php">Dates & Honey</a></li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Food products <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<ul class="list-links">
									<li><h3 class="list-links-title">Categories</h3></li>
									<li><a href="products.php"> Oils </a></li>
									<li><a href="products.php"> Olives </a></li>
									<li><a href="products.php"> Breads </a></li>
									<li><a href="products.php"> Dates </a></li>
									<li><a href="products.php"> honey </a></li>
									<li><a href="products.php"> amlou </a></li>

								</ul>
							</div>
						</li>
						<li><a href="products.php">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Shop</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Argan <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="products.php">
											<img src="layout/img//banner05.jpg" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW COLLECTION</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Oil <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="products.php">
												<img src="layout/img//banner06.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Women’s</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="products.php">
												<img src="layout/img//banner07.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Men’s</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="products.php">
												<img src="layout/img//banner08.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Accessories</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="products.php">
												<img src="layout/img//banner09.jpg" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Bags</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li><h3 class="list-links-title">Categories</h3></li>
											<li><a href="products.php">Women’s Clothing</a></li>
											<li><a href="products.php">Men’s Clothing</a></li>
											<li><a href="products.php">Phones & Accessories</a></li>
											<li><a href="products.php">Jewelry & Watches</a></li>
											<li><a href="products.php">Bags & Shoes</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="products.php">Sales</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="cart.html">Cart</a></li>
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

	