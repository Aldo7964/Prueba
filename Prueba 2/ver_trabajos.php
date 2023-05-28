<?php
// ...

// Mostrar los trabajos
if ($result->num_rows > 0) {
  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<title>Trabajos Registrados</title>";
  echo "<style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
    }

    .job {
      background-color: #f4f4f4;
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 20px;
    }

    .job h2 {
      margin-top: 0;
    }

    .job p {
      margin-bottom: 5px;
    }
  </style>";
  echo "</head>";
  echo "<body>";

  echo "<div class='container'>";
  echo "<h1>Trabajos Registrados</h1>";

  while ($row = $result->fetch_assoc()) {
    echo "<div class='job'>";
    echo "<h2>" . $row['titulo'] . "</h2>";
    echo "<p><strong>Empresa:</strong> " . $row['empresa'] . "</p>";
    echo "<p>" . $row['descripcion'] . "</p>";
    echo "</div>";
  }

  echo "</div>";

  echo "</body>";
  echo "</html>";
} else {
  echo "No se encontraron trabajos registrados.";
}

// ...
?>
