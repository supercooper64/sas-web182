<?php

/**
 * Generate URL for a script path
 *
 * @param string $scriptPath Path to script
 * @return string Complete URL
 */
function urlFor($scriptPath)
{
    // add the leading '/' if not present
    if ($scriptPath[0] != '/') {
        $scriptPath = "/" . $scriptPath;
    }
    return WWW_ROOT . $scriptPath;
}

/**
 * URL encode a string
 *
 * @param string $string String to encode
 * @return string URL encoded string
 */
function u($string = "")
{
    return urlencode($string);
}

/**
 * Raw URL encode a string
 *
 * @param string $string String to encode
 * @return string Raw URL encoded string
 */
function rawU($string = "")
{
    return rawurlencode($string);
}

/**
 * HTML encode a string
 *
 * @param string $string String to encode
 * @return string HTML encoded string
 */
function h($string = "")
{
    return htmlspecialchars($string);
}

/**
 * Return a 404 error
 *
 * @return void
 */
function error404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

/**
 * Return a 500 error
 *
 * @return void
 */
function error500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

/**
 * Redirect to a location
 *
 * @param string $location Location to redirect to
 * @return void
 */
function redirectTo($location)
{
    header("Cache-Control: no-cache");
    header("Location: " . $location);
    exit;
}

/**
 * Check if request is a POST request
 *
 * @return bool True if POST request
 */
function isPostRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Check if request is a GET request
 *
 * @return bool True if GET request
 */
function isGetRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Display error messages
 *
 * @param array $errors Array of error messages
 * @return string HTML formatted error messages
 */
function displayErrors($errors = [])
{
    $output = '';
    if (!empty($errors)) {
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
    }
    return $output;
}