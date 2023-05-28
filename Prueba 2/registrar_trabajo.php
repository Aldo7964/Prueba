<?php
// Conectar a la base de datos (modifica los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bolsa_trabajo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$empresa = $_POST['empresa'];

// Preparar la consulta SQL con sentencias preparadas para evitar la inyección de SQL
$sql = "INSERT INTO trabajos (titulo, descripcion, empresa) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $titulo, $descripcion, $empresa);

// Ejecutar la consulta preparada
if ($stmt->execute()) {
  echo "Trabajo publicado exitosamente";
} else {
  echo "Error al publicar el trabajo: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
