<?php
//Libi config
//************
//FOR MODULES
//************
$__libi_enable_user_func=false; //enable user functions
$__libi_enable_var_securities=true; //securities
$__libi_enable_names_tools=true; //tools for names
$__libi_enable_formBuilder=true;
$__libi_enable_compatibilty=false;

$__libi_pdo = array( //params for pdo
	'enabled' => false, //enable module
	'auto_pdo'=> false, //enable auto_pdo
	'user'=>'root',
	'password'=>'',
	'strConnection' => 'mysql:host=localhost;dbname=',
	'arrExtraParam' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"),

     );


//************
// FOR LIBI
//************
/**
 * @var boolean $__libi_welcome Enable if you want to have the welcome page when calling directly libi
 * @var boolean $__libi_debug_mode Eanble to have modules information
 */
$__libi_welcome=true;
$__libi_debug_mode=false;

$__libi_config_on=true; //Do not change

?>
