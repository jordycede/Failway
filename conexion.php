<?php
$host = "gondola.proxy.rlwy.net";
$port = "21395";
$dbname = "railway";
$user = "postgres";
$password = "nDgcnFTBALIRIWVAvgMLYCXWMHMIoaWh";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>