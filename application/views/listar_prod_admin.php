<main>
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
     <h1 class="display-4">Lista de productos</h1>
  </div>
  </div>
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h4>Lista de Productos</h4>
                </div>
            </div>
            <div class="col-sd-12 col-md-12">
                <div class="table-responsive"> 
                    <br>
                    <a type="button" class="btn btn-success" href="<?php echo base_url('cargarunprod'); ?>">Agregar</a> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Dimension</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Cambios</th>
                                <th>Estados</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($producto as $row){?>
                                
                            <tr>
                                <td><?php echo $row->id_producto;  ?></td>
                                <td><?php echo $row->descripcion_cat;  ?></td>
                                <td><?php echo '$',$row->precio;  ?></td>
                                <td><?php echo $row->cantidad;  ?></td>
                                <td><?php echo $row->dimensiones;  ?></td>
                                <td class="text-justify" width="30%" ><?php echo $row->descripcion;  ?></td>
                                <!--$row->imagen es la direccionnde la imagen que esta configurada en productos_c/_image_upload-->
                                <td><img src="<?php echo base_url('/uploads/imagenes_productos/').$row->imagen ?>" alt="" height="100px" width="100px" /> </td>
                                <td><a class="btn btn-warning" href="<?php echo base_url("producto_controller/editar_producto/$row->id_producto");?>">Editar</a></td>

                                <!--si la fila de estado es 0 icono desactivado, si cliquea se activara, si es 1 icono activado , si cliquea el icono se desactivara-->
                                <div class="container">
                                    <div class="row col-sm-12">
                                <?php if ($row->estado == '0'): ?>
                                    <td><a class="btn btn-danger" href="<?php echo base_url("producto_controller/estado_activar/$row->id_producto"); ?>" >Bloqueado</a></td>
                                <?php else: ?>
                                    <td><a class="btn btn-success" href="<?php echo base_url("producto_controller/estado_desactivar/$row->id_producto"); ?>" >Activo</a></td>
                                <?php endif;?>
                            </div></div>
                            </tr>

                            <?php } ?>
                        
                        </tbody>
                        	 
                    </table>  
                    <?php echo $this->pagination->create_links() ?>

                </div>
                
                <br>
                <br>
            </div>
        </div>        
    </div>

</main>