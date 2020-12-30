<section>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Detalle de pedido</h1>
  </div>
</div>
<div class="container">
<!-- Page Heading/Breadcrumbs -->
<!-- /.row -->
<div class="row">
<table id="mytable" class="table table-bordred table-striped table-hover">
<thead>
<th>Id producto</th>
<th>Producto</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Precio</th>
</thead>
<tbody>
<?php
$totpre=0;
foreach($pedidos as $row) { ?>
    <?php 
    $totpre= $totpre+$row->precio;?>
<tr>
<td> <?php echo $row->id_producto; ?> </td>
<td> <?php echo $row->descripcion_cat; ?> </td>
<td> <?php echo $row->descripcion; ?> </td>
<td> <?php echo $row->detalle_cantidad; ?> </td>
<td> <?php echo '$',$row->detalle_precio; ?> </td>
</tr>
<?php } ?>
<tr>
<th>Total</th>
<td></td>
<td></td>
<td></td>
<td><?php echo '$',$totpre?> </td> 
</tr> 
</tbody>
</table>
</div>
</div>
</section>