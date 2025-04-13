<?php require_once('../../private/initialize.php');
 
// Assign the id from $_GET['id'] if it's not empty, otherwise assign 1
$id = $_GET['id'] ?? 1;

$pageTitle = 'Salamander Details';

// Include the shared path to the header
include(SHARED_PATH . '/salamander-header.php');
?>

<h2>Salamander Details</h2>
<p>Page ID: <?= h($id); ?></p>
<p><a href="<?= urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php
// Include the shared path to the salamander footer
include(SHARED_PATH . '/salamander-footer.php');
?>