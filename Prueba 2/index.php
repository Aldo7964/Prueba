<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de Trabajo</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <header>
    <h1>Bolsa de Trabajo</h1>
  </header>
  
  <main class="container">
    <h2>Ofertas de Trabajo</h2>
    
    <?php
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

    // Consultar las ofertas de trabajo guardadas en la base de datos
    $sql = "SELECT * FROM ofertas_trabajo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='oferta'>";
        echo "<h3>" . $row['titulo'] . "</h3>";
        echo "<p>" . $row['descripcion'] . "</p>";

        // Agregar el formulario para aplicar a la oferta dentro del div de cada oferta
        echo "<form method='post' action='aplicar.php'>";
        echo "<input type='hidden' name='job_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Aplicar'>";
        echo "</form>";

        echo "</div>";
      }
    } else {
      echo "<p>No hay ofertas de trabajo disponibles.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
  </main>

  <footer>
    <p>© 2023 Bolsa de Trabajo</p>
  </footer>
</body>
</html>
