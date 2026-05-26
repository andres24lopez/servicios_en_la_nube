<?php
include("conexion.php");
$resultado = pg_query($conexion, "SELECT * FROM pacientes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clinica Cloud</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    min-height:100vh;
    color:white;
}

.card-custom{
    background:white;
    color:black;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

.title{
    font-weight:bold;
    font-size:40px;
}

.table{
    border-radius:10px;
    overflow:hidden;
}
</style>

</head>
<body>

<div class="container py-5">

<div class="text-center mb-5">
<h1 class="title">🏥 Sistema de Pacientes</h1>
<p>Aplicación en la nube con Railway + PostgreSQL</p>
</div>

<div class="row">

<div class="col-md-4">
<div class="card card-custom p-4">

<h3 class="mb-4">Registrar Paciente</h3>

<form action="guardar.php" method="POST">

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" required>
</div>

<div class="mb-3">
<label>Edad</label>
<input type="number" name="edad" class="form-control" required>
</div>

<div class="mb-3">
<label>Telefono</label>
<input type="text" name="telefono" class="form-control" required>
</div>

<button class="btn btn-primary w-100">
Guardar Paciente
</button>

</form>

</div>
</div>

<div class="col-md-8">
<div class="card card-custom p-4">

<h3 class="mb-4">Pacientes Registrados</h3>

<table class="table table-striped table-hover">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Edad</th>
<th>Telefono</th>
</tr>

<?php while($fila = pg_fetch_assoc($resultado)){ ?>

<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['edad']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
</tr>

<?php } ?>

</table>

</div>
</div>

</div>

</div>

</body>
</html>
