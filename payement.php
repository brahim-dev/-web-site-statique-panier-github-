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

	

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li class="active"><a href="cart_checkout.php">Checkout</a></li>
				<li class="active">Place Order</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
<div class="section" style="margin-bottom: 100px; text-align: center">
		<!-- container -->
	<div class="container">
			<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="payments-methods">
					<div class="section-title">
						<h3 class="title">Payments Methods</h3>
					</div>
					<div class="input-checkbox">
						<input type="radio" name="payments" id="payments-1" checked>
						<label for="payments-1"> PayPal.</label>
					</div>
					<div class="input-checkbox">
						<input type="radio" name="payments" id="payments-2">
						<label for="payments-2">Cheque Payment</label>
						<div class="caption">
							<form id="checkout-form" class="clearfix" style="margin-top: 30px">
									<div class="billing-details">
										<div class="form-group contact_us">
											<input class="input full" type="email" name="email" placeholder="Card Number">
										</div>
										<div class="form-group contact_us">
											<select class="input half">
											    <option value="0">Expiration Month :</option>
											    <option value="1">01</option>
											    <option value="2">02</option>
											    <option value="3">03</option>
											    <option value="4">04</option>
											    <option value="5">05</option>
											    <option value="6">06</option>
											    <option value="7">07</option>
											    <option value="8">08</option>
											    <option value="9">09</option>
											    <option value="10">10</option>
											    <option value="11">11</option>
											    <option value="12">12</option>
											</select>

											<select class="input half">
											    <option value="0">Expiration Year :</option>
											    <option value="1">2019</option>
											    <option value="2">2020</option>
											    <option value="3">2021</option>
											    <option value="4">2022</option>
											    <option value="5">2023</option>
											    <option value="6">2024</option>
											    <option value="7">2025</option>
											    <option value="8">2026</option>
											    <option value="9">2027</option>
											    <option value="10">2028</option>
											    <option value="11">2029</option>
											    <option value="12">2030</option>
											</select>
										</div>
										<div class="form-group contact_us">
											<input class="input full" type="text" name="address" placeholder="Security code">
										</div>

										<div class="form-group contact_us">
											<input class="input full" type="text" name="address" placeholder="Card holder">
										</div>
										
										<div class="billing-adress">
											<h4>Billing Adress</h4>
											<h6>Rue 552 Numero 55 hay salam , Agadir , Souss , MA</h6>
											<p>We recommend that the billing address you are submitting is the same as your card issuer has on file.</p>
										</div>
										
									</div>
								</div>
						</form>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="radio" name="payments" id="payments-3">
						<label for="payments-3">Credit card via PayPal</label>
						<div class="caption">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							</p>
						</div>
					</div>
				</div>
				<button class="pay_btn_back"><a href="cart.php"><span>Continue Shopping</span></a></button>
				<button class="pay_btn"><a href="#"><span>Pay Now</span></a></button>
			</div>
		</div>
	</div>
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
