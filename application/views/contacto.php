<section class="container">
				
	<div class="divcontacto">
		<?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
        $enviado = $this->session->flashdata('enviado');
        
        if ($enviado) {
            ?>
            <li class="alert alert-success" ><?php $enviado ?></li>
          <?php } ?>
  
    <div class="row">
      <div class="col-sm-12 col-md-6 mb-5 mx-auto">
        
        <?php echo validation_errors(); ?>
        
        <?php echo form_open('consultas_controller/registrar_consulta'); ?>
        
        <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Nombre y Apellido:</p></label>
          <?php echo form_input(['name' => 'nombyape', 'id' => 'nombyape', 'type' => 'nombyape', 'class' => 'form-control', 'placeholder' => 'Ingrese nombre y apellido', 'value' => set_value('nombyape')]);?></div>

         <!-- <span class="text-danger"><?php echo form_error('nombyape'); ?> </span>-->

        <div class="form-group">
          <label for="exampleInputEmail1"><p class="txtclaro">Email:</p></label>
          <?php echo form_input(['name' => 'email', 'id' => 'email', 'type' => 'Email', 'class' => 'form-control', 'placeholder' => 'Ingrese su Email', 'value' => set_value('email')]);?></div>

        <div class="form-group">
	        <label for="exampleInputEmail1"><p class="txtclaro">Telefono:</p></label>
	        <?php echo form_input(['name' => 'tel', 'id' => 'tel', 'type' => 'tel', 'class' => 'form-control', 'placeholder' => 'Ingrese telefono de contacto', 'value' => set_value('tel')]);?></div>
    
        <div class="form-group">
          <label for="comment"><p class="txtclaro">Comentarios o consultas:</p></label>
          <?php echo form_textarea(['name' => 'comentarios', 'id'=> 'comentarios', 'class' => 'form-control mx-auto', 'placeholder'=>'Ingrese su consulta','rows'=>'4','value'=> set_value('comentarios')]);?>
        </div>
        
        <div class="form-check">
           <?php  echo form_checkbox('newsletter', 1 , TRUE);?>
          <label class="form-check-label" for="exampleCheck1">Recibir notificaciones de novedades y promociones.</label>
        </div>
            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
  			<?php echo form_close();?>
</div>
    <div class="col-sm-12 col-md-6 col-xs-12 mt-4">
      <div class="cuadro-img fuente-justi3" style="color:black;">
        <div class="">
        Información De Contacto
        </div><br>
      <p>
      <b class="b">Nombre:</b> “Wooden Corrientes”<br><br>
      <b class="b">Nombre del Titular:</b> Schuster, Gerardo Tomas<br><br>
      <b class="b">CUIT:</b> 20-35450601-8 <br><br>
      <b class="b">Direccion:</b> Lavalle 1880, Corrientes.<br><br>
      <b class="b">Telefono:</b> (+54)379-4222561<br><br>
      <b class="b">Correo:</b> info@woodenctes.com</p>
      </div>
    </div>
    <hr class="my-4">
    <div class="col-sm-12 col-md-12 mx-auto text-center">
      <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.7206928098785!2d-58.83011298508169!3d-27.477953582887427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b626c71b2fd%3A0xef2077599f71cc4f!2sLavalle+1880%2C+W3402+Corrientes!5e0!3m2!1sen!2sar!4v1555190680967!5m2!1sen!2sar" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
  </div>
</div>
</div>
</section>