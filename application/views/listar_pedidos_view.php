<section>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Ordenes recibidas</h1>
  </div>
</div>
		<div class="container mb-2">
				<?php echo validation_errors(); ?>
			<div class="col-lg-6">
        		<?php echo form_open('pedidos_controller/listar_pedidos_fecha', ['class' => 'form-signin', 'role' => 'form']); ?>
        		<form>
		          <div class="form-row">
		            <div class="col-md-4 mb-2 ml-2">
		              <p class="mb-2">Desde</p>
		              <?php echo form_input(['name' => 'fecha1','type'=> 'date', 'id' => 'fecha1', 'class' => 'form-control','placeholder' => 'Desde', 'required'=>'required', 'value'=>set_value('fecha1')]); ?>
		            </div>
		            <div class="col-md-4 mb-2 ml-2">
		              <p class="mb-2">Hasta</p>
		              <?php echo form_input(['name' => 'fecha2','type'=> 'date', 'id' => 'fecha2', 'class' => 'form-control','placeholder' => 'Mes', 'required'=>'required', 'value'=>set_value('fecha2')]); ?>
		            </div>
		            
		          </div>
		          <br>
		          <?php echo form_submit('Filtrar', 'Filtrar',"class='btn btn-primary'"); ?>
		          <?php echo form_close();?>
		        </form>
		    </div>
		    				
			  <h4><?php echo $error; ?></h4>
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