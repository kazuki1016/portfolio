<?php foreach(get_errors() as $error){ ?>
  <p class="alert alert-danger text-center"><span><?php print $error; ?></span></p>
<?php } ?>
<?php foreach(get_messages() as $message){ ?>
  <p class="alert alert-success text-center"><span><?php print $message; ?></span></p>
<?php } ?>
