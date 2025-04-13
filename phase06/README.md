# Southern Appalachian Salamanders
## PHP/MySQL Project
This is a basic PHP project that connects to a MySQL database using credentials stored in a non-tracked secure file.

## Requirements
PHP 7.4+
MySQL 5.7+
Web server (e.g., Apache, Nginx)

1. Clone the repository:

git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

2. Create a db_credentials.php file:

Inside the private/ folder (create it if it doesn't exist), create a file named
db_credentials.php with the following content:
<?php define("DBSERVER", ""); define("DBUSER", ""); define("DBPASS", "");
define("DBNAME", "");

Fill in the appropriate values for your MySQL setup.

3. Protect your credentials:

Make sure db_credentials.php is listed in your .gitignore file so it is not
committed to version control:

/private/db_credentials.php

The program is written so the initialize.php will always include the
db_credentials.php file.