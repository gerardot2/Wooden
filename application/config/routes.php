<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
|
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Principal';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['inicio'] = "index";
$route['contacto'] = "consultas_controller/Pagcontacto";

$route['prodHogar'] = "Producto_controller/listar_productos";
$route['prodHogar/(:num)'] = "Producto_controller/listar_productos/$1";

$route['Terminos'] = "Principal/Terminos";
$route['quieness'] = "Principal/quienes";
$route['infocompra'] = "Principal/ccomercial";

$route['registrarse'] = "Cliente_controller/registrarse";
$route['login'] = "Principal/loguearse";
$route['cerrar_sesion'] = "Usuario_controller/cerrar_sesion";
$route['misdatos/(:num)'] = "Cliente_controller/editar_clientes/$1";
$route['cambio_user/(:num)'] = "Cliente_controller/actualizar_cliente/$1";

$route['cargarunprod'] = "Producto_controller/cargar_producto";
$route['listarprod'] = "Producto_controller/listar_productos_e";

$route['carrito'] = "Carrito_controller";

$route['consultas'] = 'consultas_controller/listar_consultas';
$route['consultasID'] = 'consultas_controller/listar_consultas_id($id=null)';

$route['ventas'] = 'Pedidos_controller/listar_pedidos';
$route['ventasc'] = 'Pedidos_controller/listar_pedidos_c';