<section>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Ordenes recibidas</h1>
  </div>
</div>
		<div class="container mb-2">
				<?php echo validation_errors(); ?>
			
			   <div class="col-lg-2">
		    	<div class="form-row mb-2 mt-4">
		    		
		    	<?php echo form_open('pedidos_controller/listar_pedidos_clientes', ['class' => 'form-signin', 'role' => 'form']); ?>
		    	<?php echo form_input(['name' => 'porid','type'=> 'text', 'id' => 'porid', 'class' => 'form-control','placeholder' => 'Id de cliente','required'=>'required', 'width'=>'15px', 'autofocus'=>'autofocus', 'value'=>set_value('porid')]); ?>
		       		<br>
		    		<button type="submit" class="btn btn-primary mt-2">Cargar</button>
		    		<?php echo form_close();?>
		    		</div>
		    	
			   	</div>
				        
			  <h3 class="text-center"><?php echo $message; ?></h3>
									
								
				<div class="row">
					
					<table id="mytable" class="table table-hover table-condensed">
						<thead >
							<th>Número de factura</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Fecha</th>
							<th>Ver</th>
						</thead>
						<tbody>
							<?php foreach($pedidos as $row) { ?>
							<tr>
								<td> <?php echo $row->orden_id; ?> </td>
								<td> <?php echo $row->apellido; ?> </td>
								<td> <?php echo $row->nombre; ?> </td>
								<td> <?php echo $row->orden_fecha; ?> </td>
								<td> <a class="btn btn-primary" target="_blank" href="<?php echo
								base_url("pedidos_controller/seleccionar_pedidos_por_id/$row->orden_id");?>" >
								<span class="fas fa-eye"></span> </a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<div class="container d-flex text-center divcontacto">
			
				
					<?php echo $this->pagination->create_links() ?>
					<hr class="my-4">
			</div>		
		
	</div>
</section>