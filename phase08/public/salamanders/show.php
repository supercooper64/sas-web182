<?php 
require_once('../../private/initialize.php'); 

$pageTitle = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php'); 
$id = $_GET['id'] ?? '1'; 
$salamander = findSalamanderById($id);
?>

<h2>Salamander Details</h2>
<p><strong>ID:</strong> <?php echo h($salamander['id']); ?></p>
<p><strong>Name:</strong> <?php echo h($salamander['name']); ?></p>
<p><strong>Habitat:</strong><br> <?php echo h($salamander['habitat']); ?> </p>
<p><strong>Description:</strong><br> <?php echo h($salamander['description']); ?></p>

<p><a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>