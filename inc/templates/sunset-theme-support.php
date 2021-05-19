<h1>Sunset Theme Support</h1>
<?php
settings_errors();
?>

<form action="options.php" method="post" class="sunset-general-form">
  <?php
  settings_fields('sunset-theme-support');
  do_settings_sections('gbgabiola_sunset_theme');
  submit_button();
  ?>
</form>
