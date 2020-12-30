<!doctype html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Hoja de estilo -->
    <link rel="stylesheet" href="<?php echo (base_url());?>/assets/css/miestilo.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo (base_url());?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> 
    <title>Wooden Corrientes</title>
  

  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-bar">
  <a class="navbar-marca">Wooden Corrientes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-3 mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo (base_url('Principal'));?>">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <?php if($this->session->userdata('perfil') != '1' ): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
        <div class="dropdown-menu" aria-labelledby="navProductos">
          <a class="dropdown-item" href="<?php echo (base_url('prodHogar/1'));?>">Mesas</a>
          <a class="dropdown-item" href="<?php echo (base_url('prodHogar/2'));?>">Sillas</a>
          <a class="dropdown-item" href="<?php echo (base_url('prodHogar/3'));?>">Chifoniers</a>
          <a class="dropdown-item" href="<?php echo (base_url('prodHogar/4'));?>">Juegos completos</a>
          <a class="dropdown-item" href="<?php echo (base_url('prodHogar/5'));?>">Sommier</a>         
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Institucional
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo (base_url('infocompra'));?>">Comercialización</a>
          <a class="dropdown-item" href="<?php echo (base_url('Terminos'));?>">Terminos y Condiciones</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo (base_url('quieness'));?>">Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo (base_url(''));?>contacto">Contacto</a>
      </li>
    </ul>
   
    <?php endif; ?>
   
    <ul class="navbar-nav ml-2">
			<?php if($this->session->userdata('login') == true): ?>
				<?php if($this->session->userdata('perfil') == '1' ): ?>
					 <li class="nav-item dropdown" id="sesion">
						<a href="#" class="nav-link" data-toggle="dropdown">Bienvenido 
							<?= $this->session->userdata('nombre')?><b class="caret"></b>
						</a>
						<!--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
							<li class="nav-item dropdown" aria-labelledby="navbarDropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navVentas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventas</a>
			        <div class="dropdown-menu">
							<a class="dropdown-item" href="<?= site_url('ventas') ?>" role="button">Por fechas</a>
							<a class="dropdown-item" href="<?= site_url('ventasc') ?>" role="button">Por Id cliente</a>
						</div>
							<li class="nav-item"><a class="nav-link" href="<?= site_url('listarprod') ?>" role="button">Productos</a></li>
							<li class="nav-item"><a class="nav-link" href="<?= site_url('consultas') ?>" role="button">Mensajes</a></li>
							<li class="nav-item"><a class="nav-link" href="<?= site_url('cerrar_sesion') ?>" role="button">Cerrar Sesión</a></li>
						<!--</ul>-->
					</li>
				<?php else: ?>
					
					<li class="nav-item dropdown" id="sesion">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bienvenido 
							<?= $this->session->userdata('nombre')?><b class="caret"></b>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li class="dropdown-item"><a href="<?= site_url('misdatos') ?>/<?php echo $this->session->userdata('id_usuario')?>" role="button">Mis Datos</a></li>
							<li class="dropdown-item"><a href="<?= site_url('cerrar_sesion') ?>" role="button">Cerrar Sesión</a></li>
						</ul>
					</li>
					<li>
						<a href="<?= site_url('carrito') ?>"><i class="fa fa-cart-plus mr-2" href="<?= site_url('carrito') ?>" style="font-size:36px"></i></a>
					</li>
				<?php endif;?>
			<?php else: ?>
				<button type="button" class="btn btn-primary mr-sm-2" data-toggle="modal" data-target="#exampleModal">
  Login
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      
      	<a href="<?php echo (base_url('login'));?>" type="button" class="btn btn-primary" aria-pressed="true">Ya estoy registrado</a>
       
      </div>
      
      <div class="text-center modal-footer">
      <p>No se ha registrado aun?</p>
        <button type="button" class="btn btn-secondary"><a href="<?php echo (base_url('registrarse'));?>">Registrarse</a></button>

      </div>
    </div>
  </div>
			<?php endif;?>
		</ul>	
    
    <!-- Button trigger modal -->

</div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>


  