<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('DS', '/');
define('DS_PATH', DIRECTORY_SEPARATOR);
define('FOLDERNAME', 'crunchy' . DS );
define('RESOURCES', 'assets');

$base = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
$base .= '://'.$_SERVER['HTTP_HOST'].DS . FOLDERNAME;

define('SITEURL2',rtrim($base, "/"));
define('SITEURL',$base);

define('AJAX_LOADER', 	'<div align="center"><img align="middle" src="assets/images/loader.gif"/></div>');

/* NORMAL CONSTANTS */
define('MENU','menu');
define('ITEM','item');
define('OFFER','offer');
define('ADD','add');
define('EDIT','edit');
define('UPDATE','update');
define('PROCESS','process');
define('DELIVERED','delivered');
define('CANCELLED','cancelled');
define('ADDON','addon');

define('REFRESH','refresh');
define('ALLOWED_TYPES','gif|jpg|png|jpeg');
define('GRP_USER', 2);
define('ADMIN', 'admin');
define('ACTIVE_CLASS', 'active_class');
/* ACTIVE CLASS CONSTANTS */
define('ACTIVE_PAGES','pages');
define('ACTIVE_MENU','menu');
define('ACTIVE_ITEMS','items');
define('ACTIVE_USERS','users');
define('ACTIVE_OFFERS','offers');
define('ACTIVE_DASHBOARD','dashboard');
define('ACTIVE_LOCATION','location');
define('ACTIVE_MASTER_SETTINGS','master_settings');
define('ACTIVE_ORDERS','orders');
define('ACTIVE_GALLERY','gallery');
define('ACTIVE_LANGUAGES','languages');
define('ACTIVE_ADDONS','addons');
define('ACTIVE_OPTIONS','options');

/* URL CONSTANTS */
define('URL_INDEX', "auth");
define('URL_LOGIN', "auth/login");
define('URL_LOGOUT', "auth/logout");
define('URL_PROFILE', "admin/profile");
define('URL_RESET_PASSWORD', "auth/reset_password");
define('URL_ADMIN_CHANGE_PASSWORD', "admin/change_password");
define('URL_ADMIN', "admin");
define('URL_ADMIN_MENU', "admin/menu");
define('URL_ADD_MENU', "admin/add_menu");
define('URL_EDIT_MENU', "admin/edit_menu");
define('URL_DELETE_MENU', "admin/delete_menu");
define('URL_ADMIN_ITEMS', "admin/items");
define('URL_ADD_ITEMS', "admin/add_item");
define('URL_EDIT_ITEMS', "admin/edit_item");
define('URL_DELETE_ITEMS', "admin/delete_item");
define('URL_ADMIN_ADDONS', "admin/addons");
define('URL_ADD_ADDON', "admin/add_addon");
define('URL_EDIT_ADDON', "admin/edit_addon");
define('URL_DELETE_ADDON', "admin/delete_addon");
define('URL_ADMIN_OPTIONS', "admin/options");
define('URL_ADD_OPTION', "admin/add_option");
define('URL_EDIT_OPTION', "admin/edit_option");
define('URL_DELETE_OPTION', "admin/delete_option");
define('URL_ADMIN_OFFERS', "admin/offers");
define('URL_CREATE_OFFER', "admin/create_offer");
define('URL_EDIT_OFFER', "admin/edit_offer");
define('URL_DELETE_OFFER', "admin/delete_offer");
define('URL_OFFER_DETAILS', "admin/offer_details");
define('URL_SITE_INDEX', "site/index");
define('URL_ADMIN_USERS', "admin/users");
define('URL_ADMIN_USER_DETAILS', "admin/user_details");
define('URL_PAGE', "page/pages/");
define('URL_CITIES', "location/cities");
define('URL_STATES', "location/states");
define('URL_EDIT_STATES', "location/states/Edit");
define('URL_SERVICE_LOCATIONS', "location/service_locations");
define('URL_SITE_SETTINGS', "settings/app_settings");
define('URL_EMAIL_SETTINGS', "settings/email_settings");
define('URL_CHANGE_LANGUAGE', "settings/change_language");
define('URL_ORDERS', "orders");
define('URL_VIEW_ORDERS', "orders/view_order");
define('URL_UPDATE_ORDERS', "orders/update_order");
define('URL_DELETE_ORDER_ITEM', "orders/delete_order_item");
define('URL_ORDERS_INDEX', "orders/index/");
define('URL_PAYPAL_SETTINGS', "settings/paypal_settings");
define('URL_EMAIL_TEMPLATE_SETTINGS', "settings/email_templates");
define('URL_GALLERY', "gallery");
define('URL_ADD_GALLERY', "gallery/add_gallery");
define('URL_EDIT_GALLERY', "gallery/edit_gallery");
define('URL_DELETE_GALLERY', "gallery/delete_gallery");
define('URL_LANGUAGES', "admin/languages");
define('URL_PHRASES', "admin/phrases");
define('URL_ADMIN_ADD_LANG', "admin/add_edit_lang");
define('URL_ADMIN_ADD_PHRASE', "admin/add_edit_phrase");
define('URL_EDIT_WEB_PHRASES', "admin/update_web_phrases");
define('URL_EDIT_APP_PHRASE', "admin/update_app_phrases");
define('URL_CHANGE_PASSWORD', "admin/change_password");
define('URL_USER_STATUSTOGGLE', "admin/statustoggle");
/* TABLE CONSTANTS */

define('DBPREFIX','dn_');
define('TBL_MENU','menu');
define('TBL_CATEGORIES','categories');
define('TBL_SUB_CATEGORIES','subcategories');
define('TBL_ITEMS','items');
define('TBL_GALLERY','gallery');
define('TBL_ITEM_REVIEW','item_review');
define('TBL_CURRENCY','currency');
define('TBL_LANGUAGES','languages');
define('TBL_PHRASES','phrases');
define('TBL_MULTI_LANG','multi_lang');
define('TBL_PAYPAL_SETTINGS','paypal_settings');
define('TBL_ORDERS','orders');
define('TBL_ORDER_PRODUCTS','order_products');
define('TBL_OFFERS','offers');
define('TBL_OFFER_PRODUCTS','offer_products');
define('TBL_OFFER_REVIEWS','offer_reviews');
define('TBL_USER_ADDRESS','user_address');
define('TBL_USERS','users');
define('TBL_TABLE_BOOKINGS','table_bookings');
define('TBL_EMAIL_TEMPLATES','email_templates');
define('TBL_SITE_SETTINGS','site_settings');
define('TBL_EMAIL_SETTINGS','email_settings');
define('TBL_STATES','pl_states');
define('TBL_CITIES','pl_cities');
define('TBL_PAGES','pages');
define('TBL_SERVICE_DELIVERED_LOCATIONS','service_provide_locations');
define('TBL_ADDONS','addons');
define('TBL_OPTIONS','options');
define('TBL_ITEM_OPTIONS','item_options');
define('TBL_ITEM_ADDONS','item_addons');
define('TBL_ORDER_ADDONS','order_addons');

/*  IMAGES UPLOAD PATH */

define('IMG_MENU','uploads/menu_images/');
define('IMG_MENU_THUMB','uploads/menu_images/thumbs/');
define('IMG_ADDONS','uploads/addon_images/');
define('IMG_ADDONS_THUMB','uploads/addon_images/thumbs/');
define('IMG_ITEMS','uploads/item_images/');
define('IMG_ITEMS_THUMB','uploads/item_images/thumbs/');
define('IMG_OFFER','uploads/offer_images/');
define('IMG_SITE_LOGO','uploads/site_logo/');
define('IMG_DEFAULT','uploads/default_images/noimage.png');
define('IMG_GALLERY_IMAGES','uploads/gallery_images/');

/* TEMPLATE CONSTANTS */

define('TEMPLATE_ADMIN','templates/admin_template');

/* PAGE CONSTANTS */
define('PAGE_DASHBOARD','admin/dashboard');
define('PAGE_USERS','admin/users/users');
define('PAGE_USER_DETAILS','admin/users/view_user_details');
define('PAGE_ADD_MENU','admin/menu/add_menu');
define('PAGE_EDIT_MENU','admin/menu/edit_menu');
define('PAGE_MENUS','admin/menu/menus');
define('PAGE_ADD_ITEM','admin/items/add_item');
define('PAGE_EDIT_ITEM','admin/items/edit_item');
define('PAGE_ITEMS','admin/items/items');
define('PAGE_ADD_ADDON','admin/addons/add_addon');
define('PAGE_EDIT_ADDON','admin/addons/edit_addon');
define('PAGE_ADDONS','admin/addons/addons');
define('PAGE_ADD_OPTION','admin/options/add_option');
define('PAGE_EDIT_OPTION','admin/options/edit_option');
define('PAGE_OPTIONS','admin/options/options');
define('PAGE_CREATE_OFFER','admin/offers/create_offer');
define('PAGE_EDIT_OFFER','admin/offers/edit_offer');
define('PAGE_OFFERS','admin/offers/offers');
define('PAGE_OFFER_DETAILS','admin/offers/offer_details');
define('PAGE_LIST_LANG','admin/languages/list_lang');
define('PAGE_LIST_PHRASES','admin/languages/list_phrases');
define('PAGE_ADD_LANG','admin/languages/add_language');
define('PAGE_WEB_PHRASE_LIST','admin/languages/web_phrase_list');
define('PAGE_APP_PHRASE_LIST','admin/languages/app_phrase_list');
define('PAGE_ADD_PHRASE','admin/languages/add_phrase');
define('PAGE_VIEW_GALLERY','admin/gallery/view_gallery');
define('PAGE_ADD_GALLERY','admin/gallery/add_gallery');
define('PAGE_EDIT_GALLERY','admin/gallery/edit_gallery');
define('PAGE_LOCATION_EXCEL','admin/location/excel_page');
define('PAGE_ADD_STATE','admin/location/states/add_state');
define('PAGE_STATES','admin/location/states/states');
define('PAGE_ADD_CITY','admin/location/cities/add_city');
define('PAGE_CITIES','admin/location/cities/cities');
define('PAGE_ADD_SERVICE_LOCATION','admin/location/service_provide_locations/add_location');
define('PAGE_SERVICE_LOCATION','admin/location/service_provide_locations/locations');
define('PAGE_ORDERS','admin/orders/orders');
define('PAGE_VIEW_ORDERS','admin/orders/view_order');
define('PAGE_PAGES','admin/pages/page');
define('PAGE_EDIT_EMAIL_TEMPLATE','admin/settings/edit_email_template');
define('PAGE_EMAIL_TEMPLATES','admin/settings/email_templates');
define('PAGE_PAYPAL_SETTINGS','admin/settings/paypal_settings');
define('PAGE_EMAIL_SETTINGS','admin/settings/email_settings');
define('PAGE_SITE_SETTINGS','admin/settings/site_settings');
define('PAGE_CHANGE_PASSWORD','admin/change_password');
define('PAGE_PROFILE','admin/profile');



/* End of file constants.php */
/* Location: ./application/config/constants.php */