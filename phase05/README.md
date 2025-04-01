# Southern Appalachian Salamanders 
## PHP/MySQL Project

This is a basic PHP project that connects to a MySQL database using credentials stored in a non-tracked secure file.

## Requirements

* PHP 7.4+
* MySQL 5.7+
* Web server (e.g., Apache, Nginx)

# Installation

1. Clone the repository

```sh
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

2. Create a `db_credentials.php` file:

Inside the `private/` folder (create it if it doesn't exist), create a file named
`db_credentials.php` with the following content:

```php
<?php 
define("DBSERVER", ""); 
define("DBUSER", ""); 
define("DBPASS", "");
define("DBNAME", "");
```


