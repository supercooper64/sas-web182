<?php

/**
 * Find all salamanders in the database
 * 
 * @return mysqli_result The database result set
 */
function findAllSalamanders()
{
    global $db;
    $sql = "SELECT * FROM salamander ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    return $result;
}

/**
 * Find a salamander by its ID
 * 
 * @param int $id The salamander ID
 * @return array|null The salamander record or null if not found
 */
function findSalamanderById($id)
{
    global $db;
    $sql = "SELECT * FROM salamander WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    confirmResultSet($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
}

/**
 * Validate salamander data
 * 
 * @param array $salamander The salamander data to validate
 * @return array List of errors (empty if valid)
 */
function validateSalamander($salamander)
{
    $errors = [];

    if (isBlank($salamander['name'])) {
        $errors[] = "Name cannot be blank.";
    } elseif (!hasLength($salamander['name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    if (isBlank($salamander['description'])) {
        $errors[] = "Description cannot be blank.";
    }

    if (isBlank($salamander['habitat'])) {
        $errors[] = "Habitat cannot be blank.";
    }

    return $errors;
}

/**
 * Insert a new salamander into the database
 * 
 * @param array $salamander The salamander data to insert
 * @return bool|array True on success, array of errors on failure
 */
function insertSalamander($salamander)
{
    global $db;

    $errors = validateSalamander($salamander);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO salamander (name, habitat, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $salamander['name'], $salamander['habitat'], $salamander['description']);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit();
    }
}

/**
 * Update an existing salamander in the database
 * 
 * @param array $salamander The salamander data to update
 * @return bool|array True on success, array of errors on failure
 */
function updateSalamander($salamander)
{
    global $db;

    $errors = validateSalamander($salamander);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE salamander SET name = ?, habitat = ?, description = ? WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssi',
        $salamander['name'],
        $salamander['habitat'],
        $salamander['description'],
        $salamander['id']
    );
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit();
    }
}

/**
 * Delete a salamander from the database
 * 
 * @param int $id The ID of the salamander to delete
 * @return bool True on success
 */
function deleteSalamander($id)
{
    global $db;
    $sql = "DELETE FROM salamander WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit();
    }
}