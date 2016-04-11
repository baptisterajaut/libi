<?php
// ************************
// LIBI VARIABLES SECURERS
// GNU GPL ABOVE ALL
// ************************

function secure_var($var)
{
    //securise une variable
    $return = addslashes($var);
    $return = htmlentities($return, ENT_COMPAT, "UTF-8");
    return $return;

}

function posta($name)
{
    echo '<!-- fposta-->';
    //renvoie ce qui est dans post, et le passe en session. Sinon renvoie ce qui est dans session. Sinon, renvoie null.
    if (isset($_POST[$name]) && !empty($_POST[$name])) {
        $return = addslashes($_POST[$name]);
        $return = htmlentities($return, ENT_COMPAT, "UTF-8");
        $_SESSION[$name] = $return;
        return $return;
    } else {
        if (isset($_SESSION[$name]) && !empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    return null;

}

function filter_int($var)
{
    //ne garde que les entiers d'une variable
    $var = secure_var($var);
    return filter_var($var, FILTER_SANITIZE_NUMBER_INT);

}


function post($name)
{ //recupere une variable post et la securise.
    echo '<!-- fpost-->';
    if (isset($_POST[$name]) && !empty($_POST[$name])) {
        $return = addslashes($_POST[$name]);
        $return = htmlentities($return, ENT_COMPAT, "UTF-8");
        return $return;
    } else
        return null;

}

function get($name)
{ //recupere une variable get et la securise.
    echo '<!-- get-->';
    if (isset($_GET[$name]) && !empty($_GET[$name])) {
        $return = addslashes($_GET[$name]);
        $return = htmlentities($return, ENT_COMPAT, "UTF-8");
        return $return;
    } else
        return null;

}

function posts($name)
{ //recupere une variable post, ne la securise pas.
    echo '<!-- fpost-->';
    if (isset($_POST[$name]))
        return $_POST[$name];
    else
        return null;
}

function gets($name)
{ //recupere une variable get, ne la securise pas.
    echo '<!-- gests-->';
    if (isset($_GET[$name]))
        return $_GET[$name];
    else
        return null;
}

?>