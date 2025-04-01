<?php 
require_once('../../private/initialize.php'); 

// Salamanders array
$salamanders = [
  ['id' => 1, 'salamanderName' => 'Red-Legged Salamander'],
  ['id' => 2, 'salamanderName' => 'Pigeon Mountain Salamander'],
  ['id' => 3, 'salamanderName' => 'ZigZag Salamander'],
  ['id' => 4, 'salamanderName' => 'Slimy Salamander']
];

// Page title
$pageTitle = 'Create Salamander';


// Include the shared path to the salamander header
include(SHARED_PATH . '/salamander-header.php'); 
?>

<a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to List</a>
<h1>Create Salamander</h1>

<form action="<?php echo urlFor('/salamanders/create.php'); ?>" method="post">
  <label for="salamanderName">Name</label><br>
  <input type="text" name="salamanderName" value="<?php echo h($salamanderName); ?>" /><br>
  <input type="submit" value="Create Salamander" />
</form>

<?php 
// Include the shared path to the salamander footer
include(SHARED_PATH . '/salamander-footer.php'); 
?>