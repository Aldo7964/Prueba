<!DOCTYPE html>
<html>
<head>
  <title>Panel de Administración</title>
  <link rel="stylesheet" type="text/css" href="css/style4.css">
</head>
<body>
  <header>
    <h1>Panel de Administración</h1>
  </header>
  
  <main class="container">
    <h2>Agregar Oferta de Trabajo</h2>
    
    <form method="post" action="agregar_oferta.php">
      <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
      </div>
      
      <div class="form-group">
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa" id="empresa" required>
      </div>
      
      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
      </div>
      
      <input type="submit" value="Agregar Oferta" class="btn-submit">
    </form>
  </main>
  
  <footer>
    <p>© 2023 Bolsa de Trabajo</p>
  </footer>
</body>
</html>

