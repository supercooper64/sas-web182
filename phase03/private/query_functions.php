<?php

// Create the find_all_salamanders() function
// This function should return an associative array of salamanders
// Remember that $db needs to be global in scope

function find_all_salamanders() {
  global $db;
  $sql = "SELECT * FROM salamander ";
  $sql .= "ORDER BY name ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
?>