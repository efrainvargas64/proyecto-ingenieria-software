<?php
  require 'database.php';
  /*Validacion de ingreso*/

  $message = '';

if (!empty($_POST['placa']) && !empty($_POST['modelo']) && !empty($_POST['descripcion'])) {
  $sql = "INSERT INTO auto (placa, modelo, descripcion) VALUES (:placa, :modelo, :descripcion)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':placa', $_POST['placa']);
  $stmt->bindParam(':modelo', $_POST['modelo']);
  $stmt->bindParam(':descripcion', $_POST['descripcion']);

  if ($stmt->execute()) {
    $message = 'Usted cuenta con un registro de vehiculo!';
  } else {
    $message = 'Disculpe, no existe su registro';
  }
}
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Signup</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php require 'partials/header.php' ?>

  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <!--Título de Signup-->
  <h1>Signup</h1>

  <span>or <a href="signup.php">Signup</a> </span>
  <form action="vehiculo.php" method="post">
    <input type="text" name="placa" placeholder="Ingrese su Placa" required>
    <input type="text" name="modelo" placeholder="Escriba el Módelo" required>
    <input type="text" name="descripcion" placeholder="Breve Descripción" required>
    <input type="submit" value="Acceder">
  </form>

</body>
</html>
