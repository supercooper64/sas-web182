<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');
 echo url_for('salamanders/index.php');
if (is_post_request()) {

  // Handle form values sent by new.php
  $salamander = [];
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';

  insert_salamander($salamander);
  $newID = mysqli_insert_id($db);
  redirect_to(url_for('salamanders/show.php?id=' . $newID));
}

echo "<h1>Stub for Create Salamander</h1>";

include(SHARED_PATH . '/salamander-footer.php');
?>