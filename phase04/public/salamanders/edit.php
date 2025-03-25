<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');

$id = $_GET['id'];
echo "<h1>Stub for Edit Salamander</h1>";

include(SHARED_PATH . '/salamander-footer.php');

if (is_post_request()) {

  // Handle form values sent by new.php
  $salamander = [];
  $salamander['id'] = $_POST['id'] ?? '';
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  insert_salamander($salamander);

  $newID = mysqli_insert_id($sb);
  redirect_to(url_for('salamanders/show.php' . $newID));
} else {
  $salamander = find_salamander_by_id($id);
}
?>

<form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">
    <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
  </label>

  <label for="habitat">
    <p>Habitat: <br>
      <textarea rows="4" cols="50" name="habitat"><?php echo h($salamander['habitat']); ?></textarea>
    </p>
  </label>

  <label for="description">
    <p>Description:<br>
      <textarea rows="4" cols="50" name="description"><?php echo h($salamander['description']); ?></textarea>
    </p>
  </label>

  <label for="submit">
    <p><input type="submit" value="Edit Salamander"></p>
  </label>

</form>