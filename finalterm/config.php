&lt;?php
$host = 'localhost';
$dbname = 'webtech_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?&gt;</content>
<parameter name="filePath">c:\xampp\htdocs\WebTech-S\config.php