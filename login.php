<?php include 'init.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo"BAGA - LOGIN"?></title>

  <link rel="stylesheet" type="text/css" href="<?php echo $css?>login.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Fav icon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $img?>favicon.ico" />

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
 
</head>
<body>
  <nav>
    <a href="index.php"><img src="<?php echo $img; ?>nav_logo.png"></a>
  </nav>

  <div class="user_forms-login">
    <i class="far fa-user-circle"></i>

    <form action="<?php echo $fun?>check.php" method="POST">
      <div class="form-group">
        <input type="name" name="username" id="username" placeholder="  USERNAME = test "/>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="  PASSWORD = test "/>
      </div>

      <button class="btn btn-warning" type="submit"><i class="fas fa-angle-right"></i></button>       
    </form>
  </div>

<footer>
  <p><span><i class="fas fa-exclamation-triangle"></i></span> website is under construction <span><i class="fas fa-exclamation-triangle"></i></span></p>
</footer>

</body>
