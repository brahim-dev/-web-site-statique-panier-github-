<?php include 'init.php'; ?>
<?php include 'includes/functions/productslist.php'; ?>
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
$err="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $comment=$_POST['comment'];
    if(!empty($_POST['name'])&&!empty($_POST['comment'])){
        addComment($_POST['name'],$_POST['comment']);
        echo "<script>alert('Bien envoiyé')</script>";
        //echo "success";
    }else{
        $err="All required";
    }
}
}

?>
<!-- section -->
<div class="section" style="margin-bottom: 100px">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form method="post" action="commentaire.php" id="checkout-form" class="clearfix" style="text-align: center">
                <?php  echo $err;?>
					<div class="col-md-12">
							<div class="section-title">
								<h3 class="title">Give a comment</h3>
							</div>
							<div class="form-group contact_us">
								<input class="input half" type="text" name="name" placeholder="Name">
							</div>
                            <div class="form-group contact_us">
                            <textarea  name="comment" rows="10" cols="50"></textarea>
							</div>
							<button class='primary-btn' type="submit" name="submit"><i class='fa fa-comment'></i>submit</button>
					</div>
				</div>
			</form>
			</div></div></div>



		<?php include $tpl.'footer.php' ?>
