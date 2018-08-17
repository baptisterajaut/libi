<?php

/**
 * take an array and removes its empty cases.
 * @param array $array array to clean up
 * @return int lenght of array
 */
function resetter(&$array)
{
    $i = 0;
    $temp = array();
    foreach ($array as $ligne) {
        $temp[$i] = $ligne;
        $i++;
    }

    $array = $temp;
    return $i;


}


/**
 * get libi css framework in string
 * @param bool $insertStyleTag if to insert style tag or not
 * @return string libi css
 */
function getLibiCss($insertStyleTag = false)
{
    $out = '';
    if ($insertStyleTag)
        $out .= '<style>';
    $out .= @file_get_contents(realpath(dirname(__FILE__)) . '/libi_files/libi.css');
    if ($insertStyleTag)
        $out .= '</style>';
    return $out;

}

/**
 * output libi css
 * @param bool $insertStyleTag if to insert style tag or not
 */
function insertLibiCss($insertStyleTag = true)
{
    echo getLibiCss($insertStyleTag);
}


//---------------
//libi_core start
//---------------
{

//************
// FOR LIBI
//************
if (!isset($__libi_config_on)) {
    if (!(@include realpath(dirname(__FILE__)) . '/libi_files/libi_config.php')) {
        trigger_error('Unable to get libi config. Running core only.', E_USER_WARNING);
    }
}

if (isset($__libi_config_on)) {
    $__libi_modules = array(
        array('name' => 'Pdo',
            'file' => 'pdo',
            'status' => 0,
            'load' => $__libi_pdo['enabled']),

        array('name' => 'Tools for names',
            'file' => 'names_tools',
            'status' => 0
        , 'load' => $__libi_enable_names_tools),
        array('name' => 'Users functions',
            'file' => 'user_func',
            'status' => 0
        , 'load' => $__libi_enable_user_func),
        array('name' => 'Variable securers',
            'file' => 'var_securities',
            'status' => 0
        , 'load' => $__libi_enable_var_securities),
        array('name' => 'Formbuilder',
            'file' => 'FormBuilder',
            'status' => 0
        , 'load' => $__libi_enable_formBuilder),
        array('name' => 'Compatibility bridge',
            'file' => 'compatibilty',
            'status' => 0
        , 'load' => $__libi_enable_compatibilty),
    );
    foreach ($__libi_modules as &$module) {
        if ($module['load']) {

            if (@(include realpath(dirname(__FILE__)) . '/libi_files/libi_' . $module['file'] . '.php')) {
                $module['status'] = 1;
            } else {
                $module['status'] = 2;
                $module['message'] = 'Unable to include file';
                trigger_error('Unable to include '.$module,E_USER_WARNING);
            }
        }
    }
    unset($module);
}


if (str_replace('\\', '/', __FILE__) == $_SERVER['SCRIPT_FILENAME']) {
// this file is not being included
if (!isset($__libi_config_on) || $__libi_welcome) {
?>
<html>
<head>
    <title>Welcome to libi</title>
    <?php insertLibiCss(); ?>
</head>
<div class="centerMe"><h1>Libi micro-framework CORE</h1>
    <?php
    if (isset($__libi_modules) && count($__libi_modules) > 0) {
        ?>
        <table border="1" class="centerMe" style="margin-left:auto;
    margin-right:auto;">
            <tr>
                <th>Module</th>
                <th>Module status</th>
            </tr>
            <?php

            foreach ($__libi_modules as $module) {
                ?>
                <tr>
                    <td><?php echo $module['name'] ?></td>
                    <td><?php switch ($module['status']) {
                            case 2 :
                                ?>
                                <div style="color:darkred; font-size:120%;font-weight: bold">
                                    ERROR <?php if ($module['message']) echo ' : ' . $module['message'] ?></div>
                                <?php break;
                            case 1 :
                                ?>
                                <div style="color:green; font-weight: bold">Enabled</div>
                                <?php break;
                            case 0 :
                                ?>
                                <div style="color:darkgray;">Disabled</div>
                            <?php
                        }
                        ?></td>


                </tr>
                <?php
            }

            ?>
        </table>
        <?php
    } else { ?> <h2> No modules loaded </h2><?php
    }
    ?>
</div>
<div class="centerMe" style="position:fixed; width:100%; height:70px; padding:5px; bottom:0px; ">
    ALL HAIL GNU GPL - Libi project - v0.2.0 - Baptiste Rajaut
</div>
<?php
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
    exit();
}
}
unset($__libi_modules);


unset($__libi_enable_names_tools);
unset($__libi_enable_var_securities);
unset($__libi_enable_formBuilder);
unset($__libi_enable_user_func);
unset($__libi_enable_compatibilty);

unset($__libi_config_on);
unset($__libi_welcome);
}
?>
