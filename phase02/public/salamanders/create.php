<?php 
require_once('../../private/initialize.php'); 

// Salamanders array
$salamanders = [
  ['id' => 1, 'salamanderName' => 'Red-Legged Salamander'],
  ['id' => 2, 'salamanderName' => 'Pigeon Mountain Salamander'],
  ['id' => 3, 'salamanderName' => 'ZigZag Salamander'],
  ['id' => 4, 'salamanderName' => 'Slimy Salamander']
];

// Handle form submission
$salamanderName = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $salamanderName = $_POST['salamanderName'] ?? '';
  // Add the new salamander to the array 
  $new_id = count($salamanders) + 1;
  $salamanders[] = ['id' => $new_id, 'salamanderName' => $salamanderName];
}

// Display the salamander name if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '<p>Salamander Name: ' . h($salamanderName) . '</p>';
}
?>