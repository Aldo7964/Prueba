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

// Insertar los datos en la base de datos
$sql = "INSERT INTO trabajos (titulo, descripcion, empresa) VALUES ('$titulo', '$descripcion', '$empresa')";

if ($conn->query($sql) === TRUE) {
  echo "Trabajo publicado exitosamente";
} else {
  echo "Error al publicar el trabajo: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
