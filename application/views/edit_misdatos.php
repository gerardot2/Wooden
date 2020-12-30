<main>
    
            <div class="jumbotron jumbotron-fluid">
    <div class="container">
     <h1 class="display-4">Editar datos.</h1>
  </div>
  </div>
    <div class="container divcontacto">
    <?php echo validation_errors();?>

    <?php echo form_open("cambio_user/$id_usuario", ['class' => 'form-signin', 'role' => 'form']); ?>

    <div class="form-group">
          <p class="txtclaro">Nombre de usuario:</p>
          <?php echo form_input(['name' => 'usuarioc', 'id' => 'usuarioc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su nombre de usuario','required'=>'required','style' => 'width:50%', 'value' => "$usuario"]);?></div>
          <span class="text-danger"><?php echo form_error('usuarioc'); ?> </span>
         

        <div class="form-group">
          <p class="txtclaro">Nombre:</p>
          <?php echo form_input(['name' => 'nombrec', 'id' => 'nombrec', 'type' => 'nombrec', 'class' => 'form-control', 'placeholder' => 'Ingrese su nombre/s','style' => 'width:50%', 'value' => "$nombre"]);?></div>
          <!--'required'=>'required'-->
          <span class="text-danger"><?php echo form_error('nombrec'); ?> </span>

        <div class="form-group">
          <p class="txtclaro">Apellido:</p>
          <?php echo form_input(['name' => 'apellidoc', 'id' => 'apellidoc', 'type' => 'nombrec', 'class' => 'form-control', 'placeholder' => 'Ingrese su apellido/s','required'=>'required', 'style' => 'width:50%', 'value' => "$apellido"]);?></div>


        <div class="form-group">
          <p class="txtclaro">Email:</p>
          <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'Ingrese su Email','required'=>'required','style' => 'width:50%', 'value' => "$email"]);?></div>

        <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Telefono:</p></label>
          <?php echo form_input(['name' => 'telefonoc', 'id' => 'telefonoc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su telefono','style' => 'width:50%', 'value' => "$telefono"]);?></div>

        <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Domicilio:</p></label>
          <?php echo form_input(['name' => 'domicilioc', 'id' => 'domicilioc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese su domicilio','style' => 'width:50%','required'=>'required', 'value' => "$domicilio"]);?></div>

          <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Ciudad:</p></label>
          <?php echo form_input(['name' => 'ciudadc', 'id' => 'ciudadc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese ciudad','style' => 'width:50%','required'=>'required', 'value' => "$ciudad"]);?></div>

          <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Provincia:</p></label>
          <?php echo form_input(['name' => 'provinciac', 'id' => 'provinciac', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Ingrese provincia','style' => 'width:50%','required'=>'required', 'value' => "$provincia"]);?></div>

         <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Contraseña:</p></label>
            <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'text', 'class' => 'form-control','placeholder' => 'Ingrese nueva contraseña','style' => 'width:50%', 'value'=> set_value('password')]); ?></div>
                
        <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Repetir contraseña:</p></label>
        <?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Repita contraseña','style' => 'width:50%', 'value'=>set_value('passconf')]); ?></div>
        
            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>

    <? echo form_close();?>
</div>

</main>