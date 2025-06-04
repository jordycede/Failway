<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nombre_usuario'];
    $clave = $_POST['contraseña'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($clave, $user['contraseña'])) {
        echo "✅ Bienvenido, " . htmlspecialchars($usuario);
    } else {
        echo "❌ Usuario o contraseña incorrectos.";
    }
}
