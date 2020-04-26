<?php include 'init.php'; 
?>
<?php include 'includes/functions/productslist.php'; ?>
<?php include $tpl.'header.php' ?>
<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
	header("location: signup.php");
}

  else if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signup.php");
  }
  //quantite
$qty=1;
if(isset($_POST['cart'])){
	if(isset($_POST['qty'])){
	$qty=floatval($_POST['qty']);}else{$qty=1;}}
  if(isset($_GET['pro_id'])){
	$product_id = $_GET['pro_id'];
	$product=getPro($product_id);
	$id = $product_id;

		if(array_key_exists($id, $_SESSION['cart'])){
			echo "<script>alert('existe deja')</script>";
			//exit;
		}else{
			//remplissage
			$_SESSION['cart'][$id]=$product;
			insertIncart($product_id,$_SESSION['client_id'],$qty);
		}
}
delete_cart();

?>


<?php include $tpl.'categories_onclick.php' ?>

	

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Cart</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->


<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									
									<?php 
									$total = 0;
									$ttl=0;
									foreach($_SESSION['cart'] as $products){
		                                $id1 = $products['id'];
										$title = $products['title'];
										$price =  $products['price'];
										$pricedd = $products['price']+10;
										$img = $products['img1'];
										
										$ttl = $price*$qty;
										$total+=$ttl;
										echo "
										<form action='cart.php' method='post' enctype='multipart/form-data'>
										<tr>
										<td class='thumb'><img src=$img alt=''></td>
										<td class='details'>
											<a href='product-page.php'>$title</a>
											<ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul>
										</td>
										<td class='price text-center'><strong>$price</strong><br><del class='font-weak'><small>$pricedd</small></del></td>
										<td class='qty text-center'><input class='input' type='number' value='$qty'></td>
										<td class='total text-center'><strong class='primary-color'>$ttl</strong></td>
										<input type='hidden' name='remove' value=$id1>
										<td class='text-right'><button type='submit' name='delete' class='main-btn icon-btn'><i class='fa fa-close'></i></button></td>
									</tr>
									</form>
										"; 
									}   //session_unset();
									?>
										
								</tbody>
								<tfoot>
									<tr>
										<?php 
										$_SESSION['prixttl']=$total;
										?>
										<th>SUBTOTAL</th>
										<th class="sub-total">$<?php echo $total; ?></th>
										<th class="empty" colspan="1"></th>
									</tr>
									<tr>
				
										<th>SHIPING</th>
										<th>Free Shipping</th>
										<th class="empty" colspan="1"></th>
									</tr>
									<tr>
										
										<th>TOTAL</th>
										<th class="total">$<?php echo $total; ?></th>
										<th class="empty" colspan="1"></th>
									</tr>
								</tfoot>
							</table>
							<a href="cart_checkout.php"><button class="primary-btn"><span>Place Order</span></button></a>
						</div>
					</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->




	<?php 
              //remove from cart 
			   function delete_cart(){
				   
				   if(isset($_POST['delete'])){
					   
					   if(isset($_POST['remove'])){
						   
						   foreach($_SESSION['cart'] as $key=>$product){
							   if($product['id']==$_POST['remove']){
									unset($_SESSION['cart'][$key]);
									//$_SESSION['cart']=\array_diff_key($_SESSION['cart'],[$key=>$product]);
							   }
						   }
						   
					   }
					   
				   }
				   
			   }
			  
			// echo @$up_cart = delete_cart();
			  
			  ?>









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
