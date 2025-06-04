<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nombre_usuario'];
    $clave = $_POST['contraseña'];
    $clave_hash = password_hash($clave, PASSWORD_DEFAULT); // Encriptar

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);

    if ($stmt->rowCount() > 0) {
        echo "❌ Usuario ya existe.";
    } else {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, contraseña) VALUES (:usuario, :clave)");
        $stmt->execute(['usuario' => $usuario, 'clave' => $clave_hash]);
        echo "✅ Usuario registrado correctamente.";
    }
}
?>