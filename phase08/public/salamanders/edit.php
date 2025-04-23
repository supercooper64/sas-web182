<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 
$pageTitle = 'Edit Salamander';
$id = $_GET['id'] ?? '';

if (isPostRequest()) {
    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';
    
    $result = updateSalamander($salamander);
    if ($result === true) {
        redirectTo(urlFor('salamanders/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
} else {
    $salamander = findSalamanderById($id);
}

?>

<form action="<?php echo urlFor('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
    <label for="name">
        <p>Name:<br> <input type="text" name="name" value="<?php echo h($salamander['name']); ?>"></p>
    </label>
    <label for="habitat">
        <p>Habitat: <br>
            <textarea rows="4" cols="50" name="habitat"><?php echo h($salamander['habitat']); ?></textarea>
        </p>
    </label>
    <label for="description">
        <p>Description:<br>
            <textarea rows="4" cols="50" name="description"><?php echo h($salamander['description']); ?></textarea> 
        </p>
    </label>
    <label for="submit">
        <p><input type="submit" value="Edit Salamander"></p>
    </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>