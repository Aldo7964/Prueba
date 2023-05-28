<?php
// Obtener los datos de la oferta de trabajo
$jobId = $_POST["job_id"];
$titulo = $_POST["titulo"];
$empresa = $_POST["empresa"];
$descripcion = $_POST["descripcion"];

// Mostrar los datos de la oferta de trabajo
echo "<h2>Nueva Oferta de Trabajo</h2>";
echo "<p><strong>Título:</strong> " . $titulo . "</p>";
echo "<p><strong>Empresa:</strong> " . $empresa . "</p>";
echo "<p><strong>Descripción:</strong> " . $descripcion . "</p>";
?>

<form method="post" action="guardar_oferta.php">
  <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">
  <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
  <input type="hidden" name="empresa" value="<?php echo $empresa; ?>">
  <input type="hidden" name="descripcion" value="<?php echo $descripcion; ?>">
  <input type="submit" value="Guardar Oferta">
</form>


