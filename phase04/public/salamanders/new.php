<?php require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');
echo "<h1>Create New Salamander</h1>";
 ?>

<form action="<?= url_for('/salamanders/create.php'); ?>" method="post">
  <p>Name:<br> <input type="text" name="name" value=""></p>
  </label>
  <label for="habitat">
    <p>Habitat: <br>
    </p>
  </label>
  <textarea rows="4" cols="50" name="habitat" value=""></textarea>
  <label for="description">
    <p>Description:<br>
    </p>
  </label>
  <textarea rows="4" cols="50" name="description" value=""></textarea>
  <label for="submit">
    <p><input type="submit" value="Create Salamander"></p>
    </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>