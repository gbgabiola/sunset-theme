<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
  <?php
  settings_fields('sunset-settings-group');
  do_settings_sections('gbgabiola_sunset');
  submit_button();
  ?>
</form>
