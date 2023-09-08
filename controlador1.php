<?php

require "modelo1.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["search"])) {
    // Procesar la búsqueda
    $results = $_DB->select(
        "SELECT * FROM `users` WHERE `nombre` LIKE ?",
        ["%{$_POST["search"]}%"]
    );

    // Resultados
    echo json_encode(count($results) == 0 ? null : $results);
} elseif (isset($_POST["nombre"])) {
    // Procesar la inserción
  // Recupera los datos del formulario
  $nombre = $_POST["nombre"];
  $Apellido_P = $_POST["Apellido_P"];
  $Apellido_M = $_POST["Apellido_M"];
  $Direccion = $_POST["Direccion"];
  $fechaNac = $_POST["fechaNac"];
  $Telefono = $_POST["Telefono"];
  $Celular = $_POST["Celular"];
  $lugarNac = $_POST["lugarNac"];
  $pais = $_POST["pais"];
  $Correo = $_POST["Correo"];
  $carrera = $_POST["carrera"];
  
  // Realiza la inserción en la base de datos
  $res = $_DB->insert(
      "INSERT INTO users (nombre, Apellido_P, Apellido_M, Direccion, fechaNac, Telefono, Celular, lugarNac, pais, email, carrera) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
      [$nombre, $Apellido_P, $Apellido_M, $Direccion, $fechaNac, $Telefono, $Celular, $lugarNac, $pais, $Correo, $carrera]
  );
    // Verifica si la inserción fue exitosa
    if ($res) {
      // Redirige al usuario a una página de éxito
      header("Location: http://localhost/examen/vista1.html"); // Cambia "exito.php" al nombre de tu página de éxito
      exit(); // Termina el script después de la redirección
  }
}
}
?>