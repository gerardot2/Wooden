<section>
	<div class="jumbotron jumbotron-fluid">
    <div class="container">
  	 <h1 class="display-4">Cargar nuevo producto</h1>
  </div>
  </div>
    <div class="container divcontacto">
	
  <?php echo validation_errors();?>

  <?php echo form_open_multipart('Producto_controller/registrar_producto',['class' => 'form-signin', 'role' => 'form']); ?>
    
    <div class="form-group">
          <p class="txtclaro">Nombre:</p>
          <?php echo form_input(['name' => 'nombrep', 'id' => 'nombrep', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingresar titulo del producto', 'value' => set_value('nombrep')]);?></div>

		<div class="form-group">
          <p class="txtclaro">Categoria:</p>
          <?php
            $lista['0'] = 'Seleccione categoria';
            foreach($categorias as $row) {
            $lista[$row->id_categoria] = $row->descripcion_cat; 
            }
            echo form_dropdown('categoria', $lista ,'0', 'class = form-control');?>
         
            </div> <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
           

    <div class="form-group">
          <p class="txtclaro">Descripcion:</p>
          <?php echo form_input(['name' => 'descripcion', 'id' => '', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese una descripción.', 'value' => set_value('descripcion')]);?></div>

		<div class="form-group">
          <p class="txtclaro">Dimensiones:</p>
          <?php echo form_input(['name' => 'dimensiones', 'id' => 'dimensiones', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingresar dimensiones', 'value' => set_value('dimensiones')]);?></div>


    <div class="form-group">
          <p class="txtclaro">Precio:</p>
          <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese el precio', 'value' => set_value('precio')]);?></div>

    <div class="form-group">
          <p class="txtclaro">Cantidad:</p>
          <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'value' => set_value('stock')]);?></div>      

    <div class="form-group">
          <p class="txtclaro">Imagen</p>
          <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value'=>set_value('imagen')]); ?>
          </div> 


        	
            <button type="submit" class="btn btn-primary mt-2">Cargar</button>

    <? echo form_close();?>
</div>

</section>