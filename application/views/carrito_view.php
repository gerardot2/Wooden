<section>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-6">Carrito de compras</h1>
  </div>
</div>
        <div class="container">
        <h2 class="text-center"><?php echo $message ?></h2>
        <?php
                //mostramos el mensaje de las sesiones flashdata dependiendo
                //de lo que hayamos hecho.
        $agregado = $this->session->flashdata('agregado');
        $destruido = $this->session->flashdata('destruido');
        $productoEliminado = $this->session->flashdata('productoEliminado');
        $productoEliminado1 = $this->session->flashdata('productoEliminado1');
        $cantidadMayor = $this->session->flashdata('cantidadMayor');
        $compra = $this->session->flashdata('compra');
        if ($agregado) {
            ?>
            <li class="alert alert-success" ><?= $agregado ?></li>
            <?php
        }elseif($destruido)
        {
            ?>
            <li class="alert alert-danger" ><?= $destruido ?></li>
            <?php
        }elseif($productoEliminado)
        {
            ?>
            <li class="alert alert-danger"><?= $productoEliminado ?></li>
            <?php
        }elseif($productoEliminado1)
        {
            ?>
            <li class="alert alert-danger"><?= $productoEliminado1 ?></li>
            <?php
        }elseif($cantidadMayor)
        {
            ?>
            <li class="alert alert-info"><?= $cantidadMayor ?></li>
            <?php
        }elseif($compra)
        {
            ?>
            <li class="alert alert-success"><?= $compra ?></li>
            <?php
        }
        ?></div>
        <div class="container">
        <?php 
                    //si el carrito contiene productos los mostramos
                     if ($carrito = $this->cart->contents()) {
                    ?>
        <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:6%">Id</th>
                            <th style="width:40%">Producto</th>
                            <th style="width:10%">Precio</th>
                            <th style="width:8%">Cantidad</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:7%"></th>
                            <th style="width:7%"></th>
                        </tr>
                    </thead>
                            
                     <tbody>
                        <?php
                foreach ($carrito as $item) {
                    ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td data-th="Product">
                                
                            <h4 class="nomargin"><?= ucfirst($item['name']) ?></h4>
                                       
                            </td>
                            <td><?= number_format($item['price'],2) ?></td>
                            <td><?= $item['qty'] ?></td>
                            <td data-th="Subtotal" class="text-center"><?= number_format($Subtotal = $item['price'] * $item['qty'],2);  ?></td>
                             
                            
                            <td id="disminuir"><?= anchor('carrito_controller/eliminarUnProducto?id=' . $item['rowid'], 'Disminuir') ?> </td>
                            <td id="eliminar"><?= anchor('carrito_controller/eliminarProducto?id=' . $item['rowid'], 'Eliminar') ?> </td>
                        </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                    <tfoot>
                        <tr id="total" class="visible-xs">
                            <td colspan="1"><strong>Total: $ <?= number_format($this->cart->total(),2) ?> Pesos.</strong></td>
                        </tr>
                        
                        <tr>
                            <td><a href="prodHogar" class="btn btn-warning padding"><i class="fa fa-angle-left"></i> Continuar comprando</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong></strong></td>
                            <td><a href="pedidos_controller/realizar_pedido" class="btn btn-success btn-block padding">Pagar <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php
                    } else {?> 
                    	<br>
                    	<br>
                    	<div class="container col-md-4 text-center"><a href="prodHogar" class="btn btn-warning"><i class="fa fa-angle-left"></i> Ir a todos los productos</a></div>
                    <?php }

                    ?>

</section>