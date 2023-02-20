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

$route['login']   = 'auth/login';
// $route['fblogin'] = 'auth/fblogin';
$route['admin'] = 'auth/login';
$route['doctor'] = 'auth/login';
$route['hospital'] = 'auth/login';
$route['logout'] = 'auth/logout';

// $route['login']                      =                  'welcome/login'; 
$route['register']                   =                  'welcome/register'; 

//Front End Route
$route['all-doctors']                =                  'welcome/doctors';
$route['consultant']                 =                  'welcome/consultant';
$route['treatment']                  =                  'welcome/treatment';
$route['Diagnostic']                 =                  'welcome/Diagnostic';
$route['blog']                       =                  'welcome/blog';   
$route['enquiry']                    =                  'welcome/enquiry';
$route['about-us']                   =                  'welcome/about';
$route['contact-us']                 =                  'welcome/contact';
$route['terms-conditions']           =                  'welcome/terms_condition';
$route['policy']                     =                  'welcome/policy';
$route['doctor-profile/(:any)']      =                  'welcome/view_profile_doctor/$1';
$route['doctor-appointment/(:any)']  =                  'welcome/appointment_details/$1';
$route['hospital-profile/(:any)']    =                  'welcome/view_hospital_profile/$1';
$route['hospital-appointment/(:any)']=                  'welcome/appointment_details_hospital/$1';
$route['specialities/(:any)']        =                  'welcome/view_specialities_list/$1';
$route['appointmentt']               =                  'welcome/appointmentt'; 
$route['appointment']                =                  'welcome/appointment';   
$route['story-details/(:any)']       =                  'welcome/story_details/$1';  

$route['appointment-details']        =                  'welcome/appointment_details';



//Consult Page Route
$route['SearchBySpecialities/(:any)']=                  'welcome/searchh/$1';
$route['SearchByConcern/(:any)']     =                  'welcome/common_special/$1';

//Search Route
$route['searching']                  =                  'welcome/search1';

//Front Dashboard Route
$route['dashboard']                  =                  'welcome/dashboard';
$route['message']                    =                  'welcome/favourites';
$route['user-profile']               =                  'welcome/view_profile_user';
$route['EHR-Doctor']                 =                  'welcome/view_ehr_doctor';
$route['EHR-hospital']               =                  'welcome/view_ehr_hospital';
$route['change-password']            =                  'welcome/change_password';



//Back End Route
$route['admin/add-doctor']                 =                  'admin/add_doctor1';




