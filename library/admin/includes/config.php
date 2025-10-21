<?php 
// DB credentials.
define('DB_HOST', 'db');  // เปลี่ยนจาก 'localhost' เป็น 'db'
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'library');

// Establish database connection.
try {
    $dbh = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER, 
        DB_PASS
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>