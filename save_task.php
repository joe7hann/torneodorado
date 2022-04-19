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

  $condicion = "SELECT * FROM participante WHERE dni = $dni";
  $resultado1 = mysqli_query($conn, $condicion);

  if(mysqli_num_rows($resultado1) > 0){
    /* $row = mysqli_fetch_array($resultado1);
    $id_apuesta_mod = $id_apuesta . '|' . $row['id_apuesta']; */
    $query = "UPDATE participante SET puntos = puntos + '$puntos' WHERE dni = $dni";
  }else{
    $query = "INSERT INTO participante(nombres, dni, id_apuesta, puntos) VALUES ('$nombres', '$dni', '$id_apuesta', '$puntos')";
  }
  



  //$query = "SELECT CONCAT_WS('|', id_apuesta, $id_apuesta) AS id_apuesta FROM participante WHERE dni = $dni";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Ingreso satisfactorio';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
