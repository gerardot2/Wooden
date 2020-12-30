<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Mensajes recibidos</h1>
  </div>
</div>
<div class="container padding">
<!-- /.row -->
<div class="row">
<table id="mytable" class="table table-bordred table-striped table-hover">
<thead>
<th>Número de Consulta</th>
<th>Nombre y Apellido</th>
<th>Ver mas detalles</th>
<th>Leido/No leido</th>
<th>Enviar novedades</th>
</thead>
<tbody>
<?php foreach($consulta as $row) { ?>
<tr>
<td> <?php echo $row->id_consulta; ?> </td>
<td> <?php echo $row->nombyape; ?> </td>
<td> <a class="btn btn-success" href="<?php echo
base_url("consultas_controller/listar_consulta_id/$row->id_consulta");?>"><i class="fas fa-edit"></i></a></td> 
			
		<?php
	if ( ($row->estado) ==1 )
		{ ?>
			<td> <a class="btn btn-danger" href="<?php echo base_url("consultas_controller/eliminar_consulta/$row->id_consulta");?>" >
			<i class="fas fa-eye-slash"></i></a></td>
		<?php } else {
		?>
		<td> <a class="btn btn-danger" href="<?php echo
base_url("consultas_controller/activar_consulta/$row->id_consulta");?>" ><i class="far fa-eye"></i></a></td> 
<?php } ?>
<td><?php
	if ( ($row->feed) ==1 )
		{ ?> <p>SI</p> <?php }  else { ?> <p>NO</p> <?php }
		?>
</td>
	</tr>
	<?php } ?>
</tbody>
</table>
</div>
</div>