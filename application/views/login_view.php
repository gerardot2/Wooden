<section>
	<div class="jumbotron jumbotron-fluid">
    <div class="container">
  	 <h1 class="display-4">Inicie Sesion</h1>
  </div>
  </div>
    <div class="container divcontacto">
	
	<?php echo validation_errors();?>

	<?php echo form_open('usuario_controller/loguear_cliente'); ?>

    <div class="container">
    <div class="form-group float-center">
          <p class="txtclaro">Usuario:</p>
          <?php echo form_input(['name' => 'usuario', 'id' => 'usuarioc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su nombre de usuario', 'value' => set_value('usuario'), 'style' => 'width:50%']);?></div>

		<div class="form-group">
          <p class="txtclaro">Contraseña:</p>
          <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Ingrese su contraseña', 'value' => set_value('contras'), 'style' => 'width:50%']);?></div>
       	
            <button type="submit" class="btn btn-primary mt-2">Aceptar</button>
    </div>

    <? echo form_close();?>
</div>

</section>