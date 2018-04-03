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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//Category Routes
$route['admin/category']='category/admin_view';
$route['admin/category/(:num)']='category/admin_view';
$route['admin/category/add']='category/addCategoryform';
$route['admin/category/delete/(:num)']='category/deleteCategory/$1';
$route['admin/category/edit/(:num)']='category/editCategoryform/$1';
$route['admin/category/settings/(:num)']='category/categorySettings/$1';
$route['admin/category/settings/save']='category/saveSettings';

$route['admin/category/update']['POST']='category/updateCategory';
$route['category/action/viewAll']='category/storeView';
$route['category/action/viewAll/(:num)']='category/storeView';
$route['category/(:any)/action/viewAll']='category/storeView/$1';
$route['category/(:any)/action/viewAll/(:num)']='category/storeView/$1';
//Product Routes
$route['product/add']='Product/add_new_view';
$route['product/add_new']='Product/add_new_product';
//Roles ROUTES
$route['admin/roles']='Roles/index';
$route['admin/roles/(:num)']='Roles/index/$1';
$route['admin/role/add']='Roles/viewForm';
$route['admin/role/addnew']='Roles/addRole';
$route['admin/role/delete/(:num)']='Roles/deleteRole/$1';
$route['admin/role/edit/(:num)']='Roles/editRoleForm/$1';
$route['admin/role/update']='Roles/updateRole';
//Login Routes
