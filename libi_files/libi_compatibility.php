<?php

// ************************
// LIBI COMPATIBILTY BRIDGE
// GNU GPL ABOVE ALL
// ************************
/**
 * Old Autoinput
 * @param string $name PHP name for the input
 * @param string $label What to display as label
 * @param string $type type of input
 * @param string $args eventual more args
 * @deprecated Use formbuilder
 */
function autoinput($name, $label, $type = '', $args = '')
{
    trigger_error('AutoInput is deprecated and will soon be removed. Use The FormBuilder instead', E_USER_DEPRECATED);
    //type : input type
    //name  : name of the form
    //echo : What's said
    //args : some paramaters (value, min, max...)
    echo '<tr><td><label for="' . $name . '">' . $label . '</label></td>';
    echo "<td><input type=\"$type\" name=\"$name\" id=\"$name\" $args /></td></tr>";


}

if (isset($__libi_pdo))
    $libi_pdo = &$__libi_pdo;
