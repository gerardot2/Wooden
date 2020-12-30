<section>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Catálogo</h1>
    <p class="lead">Nuestro catalogo de amoblamientos para el hogar.</p>
  </div>
</div>

<div class="containerpro">
  <div class="card-group">
            <?php      
               //sacamos todos los productos del array productos
            foreach ($producto as $row) {
                ?>          
                 <div class="individual col-sm-12 col-md-6 col-lg-4 text-center mt-4" >
                    <?php
                        
                        //para cada producto creamos un formulario que apuntará a la función
                        //agregarProducto del controlador para insertarlo en
                        ?>
                        <?= form_open(base_url('carrito_controller/agregarProducto')) ?>
                        <!--mostramos las imagenes de los productos-->
                        <div class="img-rounded">
                            <p align=center><img src="<?php echo base_url('/uploads/imagenes_productos/').$row->imagen ?>"  width="300px" alt="" height="300px" /></p>
                        </div>
                        
                                             
                        <div class="bg-info text-center" title="" >
                            <?= $row->nombre ?>
                        </div>
                        <div class="font-weight-light text-center" title="" >
                            <?= $row->descripcion ?>
                        </div>
                        <div class="col-xs-6 btn btn-lg btn-success btn-sm active text-center" title="precio" >
                            <?= '$',$row->precio ?>
                        </div>
                        
                        <?php if($this->session->userdata('login') and ($this->session->userdata('login') == '2') ){?>


                        <?= form_hidden('id', $row->id_producto)?>
                        <?= form_hidden('name', $row->nombre.' '.$row->descripcion)?>
                        <?= form_hidden('price', $row->precio)?>


                        <div class="text-center">
                            <?= form_submit('action', 'Agregar al carrito',"class='btn btn-success'")?>
                        </div>
                        <?= form_close() ?>

                        <?php }else{?>
                        
                        <a href="<?php echo base_url('login')?>" class="btn btn-primary  center-block">Iniciar Sesión para comprar</a>

                        <?php }?>
                </div>
                <?php
                } 
              	
                ?>
        
        
            
    </div>
    
  </div>

</section>