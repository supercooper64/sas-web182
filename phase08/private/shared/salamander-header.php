<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Salamanders';
}
?>

<!doctype html>

<html lang="en">
  <head>
    <title>SAS - <?php echo h($pageTitle); ?></title>
    <meta charset="utf-8">
  </head>

  <body>
    <header>
      <h1><a href="<?php echo urlFor('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
    </header>
    <navigation>
      <ul>
        <li><a href="<?php echo urlFor('salamanders/'); ?>">Salamanders</a></li>
      </ul>
    </navigation>