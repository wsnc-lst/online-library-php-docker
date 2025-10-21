<?php 
// DB credentials.
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'library');

// Establish database connection.
try {
    $dbh = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",  // เพิ่ม charset=utf8mb4 ใน DSN (แทน SET NAMES)
        DB_USER, 
        DB_PASS
        // ลบ array(PDO::MYSQL_ATTR_INIT_COMMAND => ...) ออกทั้งหมด
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // เพิ่มบรรทัดนี้เพื่อ throw error ถ้า query ล้ม
    $dbh->exec("SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci");  // Optional: Set charset เพิ่มถ้าต้องการ (แต่ DSN พอแล้ว)
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>