<!--  Libi project  - Licensed under GNU GPL -->

<?php


//take a session array and removes its empty cases
function resetter(&$name)
{
    echo '<!-- Resetter-->';
    $i = 0;
    $temp = array();
    foreach ($name as $ligne) {
        $temp[$i] = $ligne;
        $i++;
    }

    $name = $temp;
    return $i;


}

// THE libi function
//crate a form inside a table - amm you have to do is enter paramaterd
function autoinput($type, $name, $echo, $args)
{
    echo '<!-- autoinput-->';
    //type : input type
    //name  : name of the form
    //echo : What's said
    //args : some paramaters (value, min, max...)
    echo '<tr><td><label for="' . $name . '">' . $echo . '</label></td>';
    echo "<td><input type=\"$type\" name=\"$name\" id=\"$name\" $args /></td></tr>";


}


function show($var)
{ //verbose power
    echo '-- ' . $var . ' -- <br/>';
}


//---------------
//libi_core start
//---------------
$pdo_ok = false;
$user_func = false;
$var_securities = false;
$name_tools = false;
if (!isset($libi_config_on)) {
    if (@include('libi_files/libi_config.php')) {
        if ($libi_pdo['enabled'])
            if (@!include('libi_files/libi_pdo.php'))
                autodie('pdo');
            else $pdo_ok = true;
        if ($libi_enable_user_func)
            if (@!include('libi_files/libi_user_func.php'))
                autodie('user_func');
            else $user_func = true;
        if ($libi_enable_var_securities)
            if (@!include('libi_files/libi_var_securities.php'))
                autodie('var_securities');
            else $var_securities = true;
        if ($libi_enable_names_tools)
            if (@!include('libi_files/libi_names_tools.php'))
                autodie('names_tools');
            else $name_tools = true;
    } else
        echo '<--! Warning! Unable to get libi config. Running core only.--';
}


 function autodie($module)
{
    die('<pre>Unable to get libi ' . $module . ' module!</pre>');
}

 function isenabled($bool)
{
    if ($bool)
        return '<div style="color:green; font-weight: bold">Enabled</div>';
    else
        return '<div style="color:red; font-weight: bold">Not enabled</div>';
}


if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    // this file is not being included
    if ($libi_welcome) {
        echo '<div style="text-align: center;"><h1>Libi micro-framework CORE</h1>
		<table border="1" style="text-align:center;margin-left:auto; 
    margin-right:auto;">
		<tr><th>Module</th><th>Module status</th></tr>
		<tr><td>Pdo</td><td>' . isenabled($pdo_ok) . '</td></tr>
		<tr><td>User functions</td><td>' . isenabled($user_func) . '</td></tr>
		<tr><td>Variables securers</td><td>' . isenabled($var_securities) . '</td></tr>
		<tr><td>Tools for names</td><td>' . isenabled($name_tools) . '</td></tr>
		</table>
		</div>
		<div style="text-align:center;position:fixed; width:100%; height:70px; padding:5px; bottom:0px; ">
		ALL HAIL GNU GPL - Baptiste rajaut - v0.1.0</div>';
    } else {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
        exit();
    }
}

?>

