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
|	https://codeigniter.com/userguide3/general/routing.html
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
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'clogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['default_controller'] = 'user';
$route['home'] = 'user/home';

$route['login'] = 'user/login';
$route['log_in'] = 'clogin/access';

$route['users'] = 'ControllerUsers';
$route['addUser'] = 'ControllerUsers/addUser';


$route['log_out'] = 'clogin/log_out';

$route['listRef'] = 'creferencias/listRef';
$route['newRef'] = 'creferencias/newRef';

$route['dashboard'] = 'cdashboard';


$route['cotizaciones'] = 'CotizacionController';
$route['newCotizacion'] = 'CotizacionController/newCotizacion';
$route['getCotizaciones'] = 'CotizacionController/getCotizaciones';
$route['nwCotizacion'] = 'CotizacionController/nwCotizacion';
$route['getClients'] = 'CotizacionController/getClients';


$route['providers'] = 'ProvidersController';
$route['nwAddress'] = 'ProvidersController/addAddress';
$route['nwProvider'] = 'ProvidersController/nwProvider';
$route['nwServices'] = 'ProvidersController/addServices';
$route['nwFletes'] = 'ProvidersController/addFletes';
$route['getTypeFletes'] = 'ProvidersController/getTypeFletes';
$route['getProviders'] = 'ProvidersController/getProviders';
$route['getProviderData'] = 'ProvidersController/getProviderData';
$route['editProvider'] = 'ProvidersController/editProvider';


/*
INICIO CLIENTES
*/

$route['allClients'] = 'ClientsController';
$route['fillClients'] = 'ClientsController/fillClients';
$route['addClient'] = 'ClientsController/addClient';



/*
FIN CLIENTES
*/

//16042023
$route['fillUsers'] = 'ControllerUsers/fillUsers';
$route['asignarRef'] = 'creferencias/asignarRef';
$route['clasGlosa'] = 'creferencias/clasGlosa';


//FIN 16042023

//21042023

$route['newGasto'] = 'creferencias/newGasto';
$route['newDeposito'] = 'creferencias/newDeposito';

$route['addDctoGasto'] = 'creferencias/addDctoGasto';
$route['addDctoDeposito'] = 'creferencias/addDctoDeposito';
$route['addClientRef'] = 'creferencias/addClientRef';

$route['fillClientsref'] = 'creferencias/fillClients';
$route['atenderRef'] = 'creferencias/atenderRef';

$route['findUserAssigned'] = 'creferencias/findUserAssigned';
$route['changeStateRef'] = 'creferencias/changeStateRef';


$route['myRefs'] = 'creferencias/myRefs';
$route['allMyRefs'] = 'creferencias/allMyRefs';
$route['userAssigneds'] = 'creferencias/userAssigneds';

$route['refAssigned'] = 'creferencias/refAssigned';


$route['fillMercaList'] = 'creferencias/getMercaList';
$route['addMerca'] = 'creferencias/setMerca';
$route['mercaRefe'] = 'creferencias/mercaRefe';

$route['newContainer'] = 'creferencias/addContainer';
$route['findContainerMerca'] = 'creferencias/findContainerMerca';


$route['changeStatusCont'] = 'creferencias/setStatusCont';









