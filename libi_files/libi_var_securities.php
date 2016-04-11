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
    // sends something which in in post and send it in session
    // if post is empty, send which is in session
    // if session is empty, returns null
    //for forms
    if (isset($_POST[$name]) && !empty($_POST[$name])) {
        $return = secure_var($_POST[$name]);
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
    //keeps only ints
    $var = secure_var($var);
    return filter_var($var, FILTER_SANITIZE_NUMBER_INT);

}


function post($name)
{ //fetch post variable and secures it
    //it gives back null, so you dont have to check if empty or not
    echo '<!-- post-->';
    if (isset($_POST[$name]) && !empty($_POST[$name])) {
        $return = secure_var($_POST[$name]);
        return $return;
    } else
        return null;

}

function get($name)
{ //fetch get var and secures it
    //it gives back null, so you dont have to check if empty or not
    echo '<!-- get-->';
    if (isset($_GET[$name]) && !empty($_GET[$name])) {
        $return = secure_var($_GET[$name]);
        return $return;
    } else
        return null;

}

function posts($name)
{ //fetch post var.
    //it gives back null, so you dont have to check if empty or not

    echo '<!-- posts-->';
    if (isset($_POST[$name]))
        return $_POST[$name];
    else
        return null;
}

function gets($name)
{ //fetch get var.
    //it gives back null, so you dont have to check if empty or not

    echo '<!-- gests-->';
    if (isset($_GET[$name]))
        return $_GET[$name];
    else
        return null;
}

?>