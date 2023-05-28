<?php
// Verificar si se ha enviado el formulario de guardar oferta
// Verificar si se ha enviado el formulario de guardar oferta
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los datos del formulario
  $jobId = $_POST['job_id'];
  $titulo = $_POST["titulo"];
  $empresa = $_POST["empresa"];
  $descripcion = $_POST["descripcion"];

  // Validar el valor de jobId
  if (!is_numeric($jobId)) {
    echo "El valor de 'job_id' no es válido.";
    exit;
  }

  // Conexión a la base de datos (actualiza los valores de conexión según tu configuración)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bolsatrabajodb";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión a la base de datos
  if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
  }

  // Insertar la oferta de trabajo en la base de datos
  $sql = "INSERT INTO ofertas_trabajo (job_id, titulo, empresa, descripcion) VALUES ('$jobId', '$titulo', '$empresa', '$descripcion')";

  if ($conn->query($sql) === true) {
    // La oferta de trabajo se ha guardado correctamente
    echo "La oferta de trabajo se ha guardado correctamente.";
  } else {
    echo "Error al guardar la oferta de trabajo: " . $conn->error;
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
} else {
  echo "No se ha enviado el formulario de guardar oferta.";
}
?>

