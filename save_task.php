<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombres = $_POST['nombres'];
  $dni = $_POST['dni'];
  $id_apuesta = $_POST['id_apuesta']; 

  $valor_apostado = $_POST['valor_apostado']; 
  $cuota = $_POST['cuota']; 
  $pila_apuesta = $_POST['pila_apuesta']; 
  $puntos = $valor_apostado * $cuota * $pila_apuesta;

  $query = "INSERT INTO participante(nombres, dni, id_apuesta, puntos) VALUES ('$nombres', '$dni', '$id_apuesta', '$puntos')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Ingreso satisfactorio';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
