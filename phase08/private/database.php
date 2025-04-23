<?php

require_once('db_credentials.php');

/**
 * Connect to the database
 *
 * @return mysqli Database connection object
 */
function dbConnect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDbConnect();
    return $connection;
}

/**
 * Disconnect from the database
 *
 * @param mysqli $connection Database connection object
 * @return void
 */
function dbDisconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

/**
 * Escape a string for database insertion
 *
 * @param mysqli $connection Database connection object
 * @param string $string String to escape
 * @return string Escaped string
 */
function dbEscape($connection, $string)
{
    return mysqli_real_escape_string($connection, $string);
}

/**
 * Confirm database connection was successful
 *
 * @return void
 * @throws Exception Exits with error message if connection fails
 */
function confirmDbConnect()
{
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

/**
 * Confirm result set is valid
 *
 * @param mysqli_result|bool $resultSet Result set to check
 * @return void
 * @throws Exception Exits with error message if query fails
 */
function confirmResultSet($resultSet)
{
    if (!$resultSet) {
        exit("Database query failed.");
    }
}