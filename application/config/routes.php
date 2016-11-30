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
//$route['(^comp\d+)/:any'] = 'Wise/bingo';
//$route['show/(:num)'] = 'first/gimme/$1';
//$route['lock/(:any)/(:any)'] = 'welcome/shucks';
//$route['sleep'] = 'first/zzz';
//$route['dunno'] = function(){
//    $source = './pix/Pig-Wallpaper-150x150.jpg';
//    // set the mine type for the image
//    header("Content-type: image/jpeg");
//    header('Content-Distribution: inline');
//    readfile($source);
//    die();
//};
//$route['([a-zA-Z]{4})/bingo'] = '/bingo';
//$route['default_controller'] = 'homepage';

$route['sales/item/(:num)'] = 'sales/gimme/$1';
$route['receiving/supply/(:num)'] = 'receiving/gimme/$1';
$route['default_controller'] = 'homepage';
$route['production/ingredients/(:num)'] = 'production/gimme/$1';

//edit routing
$route['administration/editsupply/(:num)'] = 'administration/editsupply/$1';
$route['administration/editstock/(:num)'] = 'administration/editstock/$1';
$route['administration/editrecipe/(:num)'] = 'administration/editrecipe/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
