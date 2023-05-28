<?php
// Establecer la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$dbname = "BolsaTrabajoDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si se ha establecido la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de aplicación
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $jobId = $_POST["job_id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    // Validar los datos (puedes agregar tus propias validaciones aquí)
    if (empty($nombre) || empty($correo) || empty($mensaje)) {
        $error = "Por favor, completa todos los campos del formulario.";
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla "aplicaciones"
        $stmt = $conn->prepare("INSERT INTO aplicaciones (job_id, nombre, correo, mensaje) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $jobId, $nombre, $correo, $mensaje);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redireccionar a una página de éxito
            header("Location: aplicacion_exitosa.php");
            exit;
        } else {
            $error = "Error al enviar la aplicación. Por favor, intenta nuevamente.";
        }

        // Cerrar la declaración y la conexión
        $stmt->close();
    }
}

// Obtener el ID de la oferta de trabajo desde la URL
if (isset($_GET["id"])) {
    $jobId = $_GET["id"];
} else {
    // Si no se proporciona un ID válido, redireccionar a una página de error o volver a la página principal
    header("Location: index.html");
    exit;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- Resto del código HTML -->
