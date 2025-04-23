<?php

/**
 * Homepage for Salamander Application Service
 *
 * @package SAS
 */

declare(strict_types=1);

require_once('../private/initialize.php');

$pageTitle = 'Home';
include(SHARED_PATH . '/salamander-header.php'); 
?>

<h1>Welcome to SAS</h1>
<p>The Southern Appalachian Mountains Region is often hailed as the Salamander Capital of the World. In fact, the Smithsonian Conservation Biology Institute proclaims that the Appalachian region is home to more salamander species than anywhere else in the world, making it a true hotspot for salamander biodiversity.</p> 
<p><a href="https://www.savethesalamanders.com/appalachian-salamanders/">Source</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>