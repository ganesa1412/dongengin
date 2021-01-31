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
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'main';
$route['404_override'] = 'main/notfound';
$route['translate_uri_dashes'] = FALSE;

$route['view_edit/(:any)/(\d+)'] = 'main/view_edit/$1/$2';
$route['crud/add/(:any)'] = 'crud/action/add/$1/';
$route['crud/edit/(:any)/(\d+)'] = 'crud/action/edit/$1/$2';
$route['crud/delete/(:any)/(\d+)'] = 'crud/delete/$1/$2';

$route['dongeng/(:any)'] = 'main/view/dongeng_detail/$1';
$route['komunitas/(:any)'] = 'main/view/komunitas_detail/$1';
$route['event/(:any)'] = 'main/view/event_detail/$1';
$route['dashboard_komunitas/(:any)/post'] = 'main/view/dashboard_komunitas_post/$1';
$route['dashboard_komunitas/(:any)/event'] = 'main/view/dashboard_komunitas_event/$1';
$route['dashboard_komunitas/(:any)/request'] = 'main/view/dashboard_komunitas_request/$1';
$route['dashboard_komunitas/(:any)/profile'] = 'main/view/dashboard_komunitas_profile/$1';
$route['dashboard_komunitas/(:any)/comment/(:any)'] = 'main/view/dashboard_komunitas_comment/$1/$2';
$route['get/kota'] = 'main/get_kota';
$route['get/kecamatan'] = 'main/get_kecamatan';

$route['process/register'] = 'crud/register';
$route['process/verif/(:any)'] = 'crud/verif/$1';
$route['process/login'] = 'crud/login';
$route['process/logout'] = 'crud/logout';
$route['process/request/(:any)'] = 'crud/member_request/$1';
$route['process/approve/(:any)/(:any)'] = 'crud/member_approve/$1/$2';


$route['(:any)'] = 'main/view/$1/';
$route['(:any)/(:any)'] = 'main/view/$1/$2';