<?php

/**
 * Validate data presence - is the value blank?
 * Uses trim() so empty spaces don't count
 * Uses === to avoid false positives
 * Better than empty() which considers "0" to be empty
 *
 * @param mixed $value Value to check
 * @return bool True if blank
 */
function isBlank($value)
{
    return !isset($value) || trim($value) === '';
}

/**
 * Validate data presence - does the value have presence?
 * Reverse of isBlank()
 *
 * @param mixed $value Value to check
 * @return bool True if has presence
 */
function hasPresence($value)
{
    return !isBlank($value);
}

/**
 * Validate string length - is length greater than min?
 * Spaces count towards length
 * Use trim() if spaces should not count
 *
 * @param string $value String to check
 * @param int $min Minimum length
 * @return bool True if length is greater than min
 */
function hasLengthGreaterThan($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}

/**
 * Validate string length - is length less than max?
 * Spaces count towards length
 * Use trim() if spaces should not count
 *
 * @param string $value String to check
 * @param int $max Maximum length
 * @return bool True if length is less than max
 */
function hasLengthLessThan($value, $max)
{
    $length = strlen($value);
    return $length < $max;
}

/**
 * Validate string length - is length exactly equal to value?
 * Spaces count towards length
 * Use trim() if spaces should not count
 *
 * @param string $value String to check
 * @param int $exact Exact length
 * @return bool True if length equals exact
 */
function hasLengthExactly($value, $exact)
{
    $length = strlen($value);
    return $length == $exact;
}

/**
 * Validate string length - combines min, max, and exact validation
 * Spaces count towards length
 * Use trim() if spaces should not count
 *
 * @param string $value String to check
 * @param array $options Options array with 'min', 'max', or 'exact' keys
 * @return bool True if length meets all specified criteria
 */
function hasLength($value, $options)
{
    if (isset($options['min']) && !hasLengthGreaterThan($value, $options['min'] - 1)) {
        return false;
    } elseif (isset($options['max']) && !hasLengthLessThan($value, $options['max'] + 1)) {
        return false;
    } elseif (isset($options['exact']) && !hasLengthExactly($value, $options['exact'])) {
        return false;
    } else {
        return true;
    }
}

/**
 * Validate inclusion in a set
 *
 * @param mixed $value Value to check
 * @param array $set Set to check against
 * @return bool True if value is in set
 */
function hasInclusionOf($value, $set)
{
    return in_array($value, $set);
}

/**
 * Validate exclusion from a set
 *
 * @param mixed $value Value to check
 * @param array $set Set to check against
 * @return bool True if value is not in set
 */
function hasExclusionOf($value, $set)
{
    return !in_array($value, $set);
}

/**
 * Validate inclusion of character(s)
 * strpos returns string start position or false
 * uses !== to prevent position 0 from being considered false
 * strpos is faster than preg_match()
 *
 * @param string $value String to check
 * @param string $requiredString String that must be included
 * @return bool True if required string is found
 */
function hasString($value, $requiredString)
{
    return strpos($value, $requiredString) !== false;
}

/**
 * Validate correct format for email addresses
 * format: [chars]@[chars].[2+ letters]
 *
 * @param string $value Email to validate
 * @return bool True if email format is valid
 */
function hasValidEmailFormat($value)
{
    $emailRegex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($emailRegex, $value) === 1;
}

/**
 * Validates uniqueness of pages.menu_name
 * For new records, provide only the menu_name
 * For existing records, provide current ID as second argument
 *
 * @param string $menuName Menu name to check
 * @param string $currentId Current page ID (optional)
 * @return bool True if menu name is unique
 */
function hasUniquePageMenuName($menuName, $currentId = "0")
{
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE menu_name='" . $menuName . "' ";
    $sql .= "AND id != '" . $currentId . "'";

    $pageSet = mysqli_query($db, $sql);
    $pageCount = mysqli_num_rows($pageSet);
    mysqli_free_result($pageSet);

    return $pageCount === 0;
}