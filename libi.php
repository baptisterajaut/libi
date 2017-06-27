
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//take a session array and removes its empty cases
function resetter(&$name)
{
    $i = 0;
    $temp = array();
    foreach ($name as $ligne) {
        $temp[$i] = $ligne;
        $i++;
    }

    $name = $temp;
    return $i;


}

// create a form inside a table - all you have to do is enter paramaters
// Deprecated
function autoinput($name, $echo,$type='',  $args='')
{
	trigger_error('Warning : AutoInput is deprecated and will soon be removed. Use The FormBuilder instead', E_USER_WARNING);
    //type : input type
    //name  : name of the form
    //echo : What's said
    //args : some paramaters (value, min, max...)
    echo '<tr><td><label for="' . $name . '">' . $echo . '</label></td>';
    echo "<td><input type=\"$type\" name=\"$name\" id=\"$name\" $args /></td></tr>";


}

function getLibiCss($insertStyleTag=false){
	$out='';
	if($insertStyleTag)
		$out.='<style>';
	$out.=file_get_contents('libi_files/libi.css');
	if($insertStyleTag)
		$out.='</style>';	
	return $out;
	
}

function insertLibiCss($insertStyleTag=false){
	echo getLibiCss($insertStyleTag);
}

function show($var)
{ //verbose power
    echo '<p>-- ' . $var . ' -- </p>';
}


//---------------
//libi_core start
//---------------
{
$pdo_module = 0;
$user_func = 0;
$var_securities = 0;
$name_tools = 0;
$formBuilder=0;
if (!isset($libi_config_on)) {
    if (@include('libi_files/libi_config.php')) {
        if ($libi_pdo['enabled'])
            if (@!include('libi_files/libi_pdo.php'))
                $pdo_module=2;
            else $pdo_module = 1;
        if ($libi_enable_user_func)
            if (@!include('libi_files/libi_user_func.php'))
                $user_func=2;
            else $user_func = 1;
        if ($libi_enable_var_securities)
            if (@!include('libi_files/libi_var_securities.php'))
                $var_securities=2;
            else $var_securities = 1;
        if ($libi_enable_names_tools)
            if (@!include('libi_files/libi_names_tools.php'))
                $name_tools=2;
            else $name_tools = 1;
       if ($libi_enable_formBuilder)
            if (@!include('libi_files/libi_FormBuilder.php'))
                $formBuilder=2;
            else $formBuilder = 1;
    } else
        echo '<--! Warning! Unable to get libi config. Running core only.-->';
}



 function isenabled($valeur)
{
    switch ($valeur){
        case 2 : return '<div style="color:darkred; font-size:200%;font-weight: bold">ERROR</div>';

        case 1 : return '<div style="color:green; font-weight: bold">Enabled</div>';

        case 0 : return '<div style="color:darkgray;">Not enabled</div>';
}
}

if (str_replace('\\','/',__FILE__) == $_SERVER['SCRIPT_FILENAME']) {
    // this file is not being included
    if ($libi_welcome) {
        ?>
        <html>
        <head>
        <title>Welcome to libi</title>
        <?php insertLibiCss();?>
        </head>
<div class="centerMe"><h1>Libi micro-framework CORE</h1>
		<table border="1" class="centerMe" style="margin-left:auto; 
    margin-right:auto;">
		<tr><th>Module</th><th>Module status</th></tr>
		<tr><td>Pdo</td><td><?php echo isenabled($pdo_module)?></td></tr>
		<tr><td>User functions</td><td><?php echo isenabled($user_func)?></td></tr>
		<tr><td>Variables securers</td><td><?php echo isenabled($var_securities) ?></td></tr>
		<tr><td>Tools for names</td><td><?php echo isenabled($name_tools) ?></td></tr>
		<tr><td>Form Builder</td><td><?php echo isenabled($formBuilder)?></td></tr>
		</table>
		</div>
		<div class="centerMe" style="position:fixed; width:100%; height:70px; padding:5px; bottom:0px; ">
		ALL HAIL GNU GPL - Libi project - v0.1.5- Baptiste Rajaut</div>
<?php
    } else {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
        exit();
    }
}
}
?>
<!--  Libi project  - Licensed under GNU GPL -->
