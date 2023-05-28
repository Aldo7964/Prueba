<?php
// Verificar si se ha enviado el formulario de aplicación
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los datos del formulario
  if (isset($_POST["job_id"])) {
    $jobId = $_POST["job_id"];
  } else {
    $jobId = "";
  }

  if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
  } else {
    $nombre = "";
  }

  if (isset($_POST["correo"])) {
    $correo = $_POST["correo"];
  } else {
    $correo = "";
  }

  if (isset($_POST["mensaje"])) {
    $mensaje = $_POST["mensaje"];
  } else {
    $mensaje = "";
  }

  // Validar los datos (puedes agregar más validaciones según tus necesidades)
  if (empty($nombre) || empty($correo) || empty($mensaje)) {
    $error = "Por favor, completa todos los campos.";
  } else {
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

    // Insertar la aplicación en la base de datos
    $sql = "INSERT INTO aplicaciones (job_id, nombre, correo, mensaje) VALUES ('$jobId', '$nombre', '$correo', '$mensaje')";

    if ($conn->query($sql) === true) {
      // La aplicación se ha guardado correctamente
      header("Location: aplicacion_exitosa.php");
      exit;
    } else {
      $error = "Error al guardar la aplicación: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Aplicar a Oferta de Trabajo</title>
  <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
  <header>
    <h1>Bolsa de Trabajo</h1>
  </header>
  
  <main class="container">
    <h2>Aplicar a Oferta de Trabajo</h2>
    
    <?php if (isset($error)) { ?>
      <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
      <input type="hidden" name="job_id" value="<?php echo isset($_POST["job_id"]) ? $_POST["job_id"] : ""; ?>">
      
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" required>
      
      <label for="correo">Correo electrónico:</label>
      <input type="email" name="correo" id="correo" required>
      
      <label for="mensaje">Mensaje:</label>
      <textarea name="mensaje" id="mensaje" required></textarea>
      
      <input type="submit" value="Enviar">
    </form>
  </main>
  
  <footer>
    <p>© 2023 Bolsa de Trabajo</p>
  </footer>
</body>
</html>
