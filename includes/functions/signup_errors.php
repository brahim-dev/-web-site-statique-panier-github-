<?php  if (count($signup_errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($signup_errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>