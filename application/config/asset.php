<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sekati CodeIgniter Asset Helper
 *
 * @package		Assets
 * @author		Omondi Kevin && Joshua Bakasa 
 * @copyright	Copyright (c) 2013, Sekati LLC.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://sekati.com
 * @version		v1.2.7
 * @filesource
 *
 * @usage 		$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 * @example		<img src="<?=asset_url();?>imgs/photo.jpg" />
 * @example		<?=img('photo.jpg')?>
 *
 * @install		Copy config/asset.php to your CI application/config directory
 *				& helpers/asset_helper.php to your application/helpers/ directory.
 * 				Then add both files as autoloads in application/autoload.php:
 *
 *				$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 *
 *				Autoload CodeIgniter's url_helper in `application/config/autoload.php`:
 *				$autoload['helper'] = array('url');
 *
 * @notes		Organized assets in the top level of your CodeIgniter 2.x app:
 *					- assets/
 *						-- css/
 *						-- download/
 *						-- img/
 *						-- js/
 *						-- less/
 *						-- swf/
 *						-- upload/
 *						-- xml/
 *					- application/
 * 						-- config/asset.php
 * 						-- helpers/asset_helper.php
 */

/*
|--------------------------------------------------------------------------
| Custom Asset Paths for asset_helper.php
|--------------------------------------------------------------------------
|
| URL Paths to static assets library
|
*/

$config['asset_path'] 		= 	'assets/';
$config['css_path'] 		= 	'assets/css/';
$config['download_path'] 	= 	'assets/download/';
$config['less_path'] 		= 	'assets/less/';
$config['js_path'] 			= 	'assets/js/';
$config['img_path'] 		= 	'img/';
$config['swf_path'] 		= 	'assets/swf/';
$config['upload_path'] 		= 	'assets/upload/';
$config['xml_path'] 		= 	'assets/xml/';
$config['plugin_path']		=	'assets/plugins/';
$config['files_path']		=	'assets/files/';

$config['css_files']		=	array(
									array('title'=> 'reset',	'file' => 'reset.css'),
									array('title'=> 'auth',	'file' => 'auth.css')
								);
$config['js_files']			=	array(
									array('title'=> 'signup',	'file' => 'signup.js')
								);
$config['plugin_js_files']	=	array(
									array('title'=> 'jquery',    'file'	=>	'jquery/jquery-3.2.1.min.js'),
									array('title'=> 'bootstrap',    'file'	=>	'bootstrap/js/bootstrap.min.js'),
									array('title'=> 'datatables',    'file'	=>	'js/plugins/dataTables/datatables.min.js')
								);	
$config['plugin_css_files']	=	array(
									array('title' => 'bootstrap',	'file' => 'bootstrap/css/bootstrap.min.css'),
									array('title' => 'bootstrap',	'file' => 'bootstrap/css/bootstrap-theme.min.css')
								);
$config['plugin_php_files']	=	array(
									// array('title'	=> 	'phpexcel'		,			'file'	=>	'PHPExcel/PHPExcel.php'),
								);
/* End of Home assets */
$config['salt_phrase'] = 'ivw9h39ue93uriwu925h298208h9hghwp9438g49g294h20gub9e8049IU#biu9BUU9RBIHVIH2BRIBIFBAI92EB';

$config['hash_phrase'] = 'HWIBIWBIFBIBIFWB89389385iBIVy8wrgtr7gv3i9g3gauirgvy83fgtuif4768fgyif8rygfg8f68yc';
// Default passwords
$config['admin_pass'] = 'admin123456';
$config['conti-partner'] = 'Silverstone123456';
// Default passwords

//Company Details
$config['company'] = 'Silverstone';
$config['location'] = 'Silverstone Tyres (K) LTD';
//Company Details

//Constants
$config['apiURL'] = 'http://localhost/api/';
$config['appKey'] = 'w44o8s0o4w8scocg0koos0g4g488c8wgwokccogk';
define('webServiceUrl', 'http://www.silverstonetest5.com:8094/Service.svc?wsdl'); //live at silverstone
//Constants

//ODATA URIs
// //Local at Bakasa
// $config['custLegdEntService'] = "http://desktop-dqo3oba:8048/GLACIER-NAV15/OData/Company('SilverStone Tyres Ltd')/custLegdEntService?\$format=json";
// $config['curlUsername'] = "Bakasa";
// $config['curlPassword'] = "pronto";
// //Local at Bakasa

//Live on Server
$config['custLegdEntService'] = "http://10.10.10.222:7048/DynamicsNAV80/OData/Company('SilverStone Tyres Ltd')/custLedgerEntries?\$format=json";
$config['curlUsername'] = "intergration";
$config['curlPassword'] = "Inter.321";
//Live on server
//ODATA URIs