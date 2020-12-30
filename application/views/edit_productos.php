<main>
    
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
             <h1 class="display-4">Editar productos</h1>
            </div>
            </div>
          <div class="container mb-auto">
                        <!-- /.row -->
                <div class="row">
                <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <?php echo form_open_multipart("producto_controller/actualizar_producto/$producto_id", ['class' => 'form-signin', 'role' => 'form']); ?>
            
            <div class="form-group">
            <label for="titulo">Nombre</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese nombre del producto', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>"$nombre"]); ?>
            </div>
            <span class="text-danger"><?php echo form_error('titulo'); ?> </span>

            <div class="form-group">
			<label for="categoria">Categoria</label>
			<?php
				$listaa[$categoria] = $categoria;
				foreach ($categoria1 as $row) {
				$listaa[$row->id_categoria] = $row->descripcion_cat;
				}
			echo form_dropdown('categoria', $listaa,'0','class="form-control"');
			?>
			</div>
               
            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder' => 'Ingrese descripción', 'required'=>'required', 'value'=>"$descripcion"]); ?>
            </div>
            <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    	<label for="descripcion">Imagen</label>
                        <?php echo form_input(['type' => 'file','name' => 'imgname', 'id' => 'imgname']); ?>
                        <?php echo form_error('imgname'); ?>
                    </div>      
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="<?php  echo base_url('/uploads/imagenes_productos/').($imagen); ?>" >
                    </div>  
                </div>
            </div>

            <div class="form-group">
            <label for="cantidad">Cantidad en existencia</label>
            <?php echo form_input(['name' => 'cantidad', 'id' => 'cantidad', 'class' => 'form-control','placeholder' => 'Ingrese Stock', 'required'=>'required', 'value'=>"$cantidad"]); ?>
            </div>
            <span class="text-danger"><?php echo form_error('cantidad'); ?> </span>

            <div class="form-group">
            <label for="titulo">Dimensiones</label>
            <?php echo form_input(['name' => 'dimensiones', 'id' => 'dimensiones', 'class' => 'form-control','placeholder' => 'Ingrese dimensiones del producto', 'autofocus'=>'autofocus', 'value'=>"$dimensiones"]); ?>
            </div>

            <div class="form-group">
            <label for="precio">Precio</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Ingrese precio', 'required'=>'required', 'value'=>"$precio"]); ?>
            </div>
            <span class="text-danger"><?php echo form_error('precio'); ?> </span>

           
            <div style="margin-top:10px margin-bottom:20px" class="form-group">
    <!-- Button -->
    <div class="col-sm-12 controls">
    <?php echo form_submit('Modificar', 'Modificar',"class='btn btn-success divcontacto'"); ?>
    </div>
    <?php echo form_close();?>
    </div>
    </div>
    </div>
    </div>
    
</main>