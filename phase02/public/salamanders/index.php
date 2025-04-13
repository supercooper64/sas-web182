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
$pageTitle = 'Salamanders';

// Include the shared path to the salamander header
include(SHARED_PATH . '/salamander-header.php'); 
?>

<h1>Salamanders Main Page</h1>

<a href="<?php echo urlFor('/salamanders/new.php'); ?>">Create a Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php foreach($salamanders as $salamander) { ?>
    <tr>
      <!-- Display the salamander id -->
      <td><?php echo h($salamander['id']); ?></td>
      <!-- Display the salamander name -->
      <td><?php echo h($salamander['salamanderName']); ?></td>
      <!-- Use urlFor with show.php AND h(u) with the salamander['id'] -->
      <td><a href="<?php echo urlFor('/salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
      <td><a href="<?php echo urlFor('/salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
      <td><a href="#">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<?php 
// Include the shared path to the salamander footer
include(SHARED_PATH . '/salamander-footer.php'); 
?>