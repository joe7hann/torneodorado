<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            Nombres: <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombre" autofocus>
		<br>
	    DNI: <input type="text" name="dni" class="form-control" placeholder="Ingrese DNI" autofocus>
		<br>
	    ID de apuesta:<input type="text" name="id_apuesta" class="form-control" placeholder="Ingrese ID apuesta" autofocus>
		<br>
	    Detalles de la apuesta:
		<br>
	Valor apostado: <input type="text" name="valor_apostado" class="form-control" placeholder="Ingrese valor apostado" autofocus>
		<br>
	Cuota:<input type="text" name="cuota" class="form-control" placeholder="Ingrese Cuota" autofocus>
		<br>
	Pila de apuestas: <input type="text" name="pila_apuesta" class="form-control" placeholder="Ingrese pila de apuestas" autofocus>
          </div>

          

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Agregar participante">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombres</th>
            <th>DNI</th>
            <th>ID apuesta</th>
            <th>Puntos</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM participante";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombres']; ?></td>
            <td><?php echo $row['dni']; ?></td>
            <td><?php echo $row['id_apuesta']; ?></td>
	    <td><?php echo $row['puntos']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['dni']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['dni']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
