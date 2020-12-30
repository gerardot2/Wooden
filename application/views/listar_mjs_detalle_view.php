<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Mensajes recibidos</h1>
  </div>
</div>
<div class="container">
<!-- Page Heading/Breadcrumbs -->
<!-- /.row -->
<div class="row">
<table id="mytable" class="table table-bordred table-striped table-hover">
<thead>
<th>Nombre y Apellido</th>
<th>Telefono</th>
<th>Email</th>
<th>Descripcion</th>
</thead>
<tbody>
<?php foreach($consulta as $row) { ?>

<tr>
<td> <?php echo $row->nombyape; ?> </td>
<td> <?php echo $row->telefono; ?> </td>
<td> <?php echo $row->email; ?> </td>
<td> <?php echo $row->comentario; ?> </td>
</tr>
<?php } ?>
</tbody>
</table>
<a class="btn btn-primary " href="<?php echo
base_url("consultas")?>">Volver a lista</a>
</div>
</div>