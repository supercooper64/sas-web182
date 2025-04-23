<?php 

require_once('../../private/initialize.php');

$salamanderSet = findAllSalamanders(); 
$pageTitle = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php'); 

?>
<h1>Salamanders</h1>

<a href="<?php echo urlFor('salamanders/new.php'); ?>">Create Salamander</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Habitat</th>
        <th>Desc</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    
    <?php while ($salamander = mysqli_fetch_assoc($salamanderSet)) : ?>
        <tr>
            <td><?php echo h($salamander['id']); ?></td>
            <td><?php echo h($salamander['name']); ?></td>
            <td><?php echo h($salamander['habitat']); ?></td>
            <td><?php echo h($salamander['description']); ?></td>
            <td><a href="<?php echo urlFor('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
            <td><a href="<?php echo urlFor('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
            <td><a href="<?php echo urlFor('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php mysqli_free_result($salamanderSet); ?>
<p>Thanks to <a href="https://herpsofnc.org">Amphibians and Reptiles of North Carolina</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>