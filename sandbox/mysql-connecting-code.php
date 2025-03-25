<?php

// 1.) Connect to the MySQL database
$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "test";
$connect = mysqli_connect($server, $user, $pw, $db);


// 2.) Test the connection 
if (!$connect)
{
    print ("ERROR: Cannot connect to databse $db on server $server using username $user (".mysqli_connect_errno() . ", " . mysqli_connect_error(). ")");
}

// 3.) Write the query
$userQuery = "SELECT firstName, lastName FROM personnel";

// 4.) Run the query
$result = mysqli_query($connect, $userQuery);
var_dump ($result); exit;

// 5.) Test to see if the query ran without error
if (!$result)
{
    print ("Could not successfully run query ($userQuery) from $db: " . mysqli_error($connect) );
}

// 6.) Test to see if any rows were returned
if (mysqli_num_rows($result) == 0 )
{
    print ("No records found with query $userQuery");
}
else
// 7.) Display the results
{
    print ("<h1>List of Employees</h1>");
    print ("<table>");
    print ("<tr><th>First Name</th><th>Last Name</th></tr>");
    // 8.)  Use a while loop to iterate through the result set.
    //      Store the result in an associative array named $row
    while ($row = mysqli_fetch_assoc($result))
    {
        // 9.)  Use the $row associated array with the field names from the 
        //      table to display the data
        print ("<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</tr>");
    }
    print("<table>");
}

// 10.) Close the MySQL database connection
mysqli_close($connect);

?>
