<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

if (isPostRequest()) {
    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insertSalamander($salamander);
    if ($result === true) {
        $newID = mysqli_insert_id($db);
        redirectTo(urlFor('salamanders/show.php?id=' . $newID));
    } else {
        $errors = $result;
    }
}

$pageTitle = 'Create Salamander'; 
?>

<h1>Create Salamander</h1>
<form action="<?php echo urlFor('salamanders/new.php'); ?>" method="post">
    <label for="name">
        <p>Name:<br> <input type="text" name="name" value=""></p>
    </label>
    <label for="habitat">
        <p>Habitat: <br>
            <textarea rows="4" cols="50" name="habitat"></textarea>
        </p>
    </label>
    <label for="description">
        <p>Description:<br>
            <textarea rows="4" cols="50" name="description"></textarea> 
        </p>
    </label>
    <label for="submit">
        <p><input type="submit" value="Create Salamander"></p>
    </label>
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>