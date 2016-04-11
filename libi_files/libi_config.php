<?php
//Libi config
//************
//FOR MODULES
//************
$libi_enable_user_func=false; //enable user functions
$libi_enable_var_securities=true; //securities
$libi_enable_names_tools=false; //tools for names


$libi_pdo = array( //params for pdo
	'enabled' => 1, //enable module
	'user'=>'root',
	'password'=>'poi',
	'strConnection' => 'mysql:host=localhost;dbname=materiel',
	'arrExtraParam' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
     );


//************
// FOR LIBI
//************
$libi_welcome=true; //show informations if you call directly libi.php
$libi_config_on=true; //Do not change

?>
