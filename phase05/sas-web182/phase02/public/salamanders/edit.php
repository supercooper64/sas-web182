<?php 
require_once('../../private/initialize.php'); 

// Salamanders array
$salamanders = [
  ['id' => 1, 'salamanderName' => 'Red-Legged Salamander'],
  ['id' => 2, 'salamanderName' => 'Pigeon Mountain Salamander'],
  ['id' => 3, 'salamanderName' => 'ZigZag Salamander'],
  ['id' => 4, 'salamanderName' => 'Slimy Salamander']
];

// Find the salamander by ID
$id = $_GET['id'] ?? '1'; // Default to 1 if no ID is provided
$salamander = null;
foreach($salamanders as $s) {
  if($s['id'] == $id) {
    $salamander = $s;
    break;
  }
}

// Handle form submission
$salamanderName = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $salamanderName = $_POST['salamanderName'] ?? '';
  // Update the salamander's name in the array (in a real application, you would update the database)
  foreach($salamanders as &$s) {
    if($s['id'] == $id) {
      $s['salamanderName'] = $salamanderName;
      break;
    }
  }
  // Update the current salamander's name
  $salamander['salamanderName'] = $salamanderName;
}

// Page title
$pageTitle = 'Edit Salamander';

// Display the salamander name if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '<p>Salamander Name: ' . h($salamander['salamanderName']) . '</p>';
}

// Include the shared path to the salamander header
include(SHARED_PATH . '/salamander-header.php'); 
?>

<a href="<?php echo urlFor('/salamanders/index.php'); ?>">&laquo; Back to List</a>
<h1>Edit Salamander</h1>

<form action="<?php echo urlFor('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="salamanderName">Name</label><br>
  <input type="text" name="salamanderName" value="<?php echo h($salamanderName); ?>" /><br>
  <input type="submit" value="Edit Salamander" />
</form>

<?php 
// Include the shared path to the salamander footer
include(SHARED_PATH . '/salamander-footer.php'); 
?>