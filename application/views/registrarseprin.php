<section>
	<div class="jumbotron jumbotron-fluid">
    <div class="container">
  	 <h1 class="display-4">Registrarse</h1>
  </div>
  </div>
    <div class="container divcontacto">
    	<div class="col-lg-6 bg-light">
	<?php echo validation_errors();?>

	<?php echo form_open('cliente_controller/registrar_cliente'); ?>

    <div class="form-group">
          <p class="">Nombre de usuario:</p>
          <?php echo form_input(['name' => 'usuarioc', 'id' => 'usuarioc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su nombre de usuario', 'value' => set_value('usuarioc')]);?></div>

		<div class="form-group">
          <p class="">Nombre:</p>
          <?php echo form_input(['name' => 'nombrec', 'id' => 'nombrec', 'type' => 'nombrec', 'class' => 'form-control', 'placeholder' => 'Ingrese su nombre/s', 'value' => set_value('nombrec')]);?></div>

		<div class="form-group">
          <p class="">Apellido:</p>
          <?php echo form_input(['name' => 'apellidoc', 'id' => 'apellidoc', 'type' => 'nombrec', 'class' => 'form-control', 'placeholder' => 'Ingrese su apellido/s', 'value' => set_value('nombrec')]);?></div>


        <div class="form-group">
          <p class="">Email:</p>
          <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese su Email', 'value' => set_value('email')]);?></div>

        <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Telefono:</p></label>
          <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su telefono', 'value' => set_value('telefono')]);?></div>

        <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Domicilio:</p></label>
          <?php echo form_input(['name' => 'domicilioc', 'id' => 'domicilioc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su domicilio', 'value' => set_value('domicilioc')]);?></div>

         <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Ciudad:</p></label>
          <?php echo form_input(['name' => 'ciudadc', 'id' => 'ciudadc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese ciudad', 'value' => set_value('ciudadc')]);?></div>

         <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Provincia:</p></label>
          <?php echo form_input(['name' => 'provinciac', 'id' => 'provinciac', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese provincia', 'value' => set_value('provinciac')]);?></div>

        
        <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Contrasena:</p></label>
        	<?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'text', 'class' => 'form-control','placeholder' => 'Ingrese Password', 'value'=>set_value('password')]); ?></div>
				
        <div class="form-group">
          <label for="exampleInputEmail1"><p class="">Repetir contrasena:</p></label>
					<?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Repita el password', 'value'=>set_value('passconf')]); ?></div>
		
            <button type="submit" class="btn btn-primary mt-2">Enviar</button>

    <? echo form_close();?>
  </div>
</div>

</section>