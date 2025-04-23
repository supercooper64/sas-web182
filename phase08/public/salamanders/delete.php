<?php 
require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');

if (!isset($_GET['id'])) {
    redirectTo(urlFor('salamanders/index.php'));
}
$id = $_GET['id'];
    
if (isPostRequest()) {
    deleteSalamander($id);
    redirectTo(urlFor('salamanders/index.php'));
} else {
    $salamander = findSalamanderById($id);
}
  
$pageTitle = 'Delete Salamander';
?>
  
<a href="<?php echo urlFor('salamanders/index.php'); ?>">&laquo; Back to Salamanders</a>
<h1>Delete Salamander</h1>
<p>Are you sure you want to delete this salamander?</p>
<p><?php echo h($salamander['name']); ?></p>
  
<form action="<?php echo urlFor('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post">
    <input type="submit" name="commit" value="Delete Salamander" />
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>