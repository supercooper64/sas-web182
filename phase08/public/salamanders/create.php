<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

if (isPostRequest()) {
    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    insertSalamander($salamander);
    $newID = mysqli_insert_id($db);
    redirectTo(urlFor('salamanders/show.php?id=' . $newID));
}

include(SHARED_PATH . '/salamander-footer.php'); 
?>