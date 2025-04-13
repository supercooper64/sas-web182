<?php require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$page_title = 'View Salamander';
include(SHARED_PATH . '/salamander-header.php'); 
$salamander = find_salamander_by_id($id);
?>

  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

   <p> Page ID: <?= h($id); ?> </p>

   <h2>Salamander Details</h2>
<p><strong>Name:</strong> <?=h($salamander['name']);?></p>
<p><strong>Habitat:</strong><br><?=h($salamander['habitat']);?> </p>
<p><strong>Description:</strong><br><?=h($salamander['description']);?> </p>
<p><a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a></p>
<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
