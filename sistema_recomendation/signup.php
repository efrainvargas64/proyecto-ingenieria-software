<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Felicidades, usted ya está registrado!';
    } else {
      $message = 'Disculpa, tu registro es invalido';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registro de Usuario</h1>
    <span>or <a href="login.php">Login de Acesso!</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Nombres Completos" required>
      <input name="password" type="password" placeholder="Ingrese número de Cédula" required>
      <input name="confirm_password" type="password" placeholder="Confirme su número, por favor!" required>
      <input type="submit" value="Submit">
    </form>

    <span>Cuentas con registro de Vehículo, <a href="vehiculo.php">Ingresa aquí!</a></span><br><br>
    <span>Modifica tus datos, <a href="forms-user/usuario.php">Actuales!</a></span>
  </body>
</html>
