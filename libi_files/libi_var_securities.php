<?php
// ************************
// LIBI VARIABLES SECURERS
// GNU GPL ABOVE ALL
// ************************

function posta($name)
{
    // sends something which in in post and send it in session
    // if post is empty, send which is in session
    // if session is empty, returns false
    //for forms
    if (array_key_exists($name,$_POST) && $_POST[$name] !== ""){
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




function post($name)
{ //fetch post variable and secures it
    //it gives back false, so you dont have to check if empty or not.
    if (array_key_exists($name,$_POST) && $_POST[$name] !== ""){
        return secure_var($_POST[$name]);
    } else
        return null;

}


function posts($name)
{ //fetch post var.
    //it gives back false, so you dont have to check if empty or not

    if (array_key_exists($name,$_POST)&& $_POST[$name] !== "")
        return $_POST[$name];
    else
        return null;
}

function get($name)
{ //fetch get var and secures it
    //it gives back false, so you dont have to check if empty or not
    if (array_key_exists($name,$_GET) && $_GET[$name] !== "") {
        return secure_var($_GET[$name]);

    } else
        return null;

}

function gets($name)
{ //fetch get var.
    //it gives back false, so you dont have to check if empty or not

    if (array_key_exists($name,$_GET)&& $_GET[$name] !== "") 
        return $_GET[$name];
    else
        return null;
}

function path_info($number,$delimiter='/'){
	if(empty($_SERVER['PATH_INFO']))
		return null;
	$test=explode($delimiter,$_SERVER['PATH_INFO']);
	return $test[$number+1];
}

function filter_int($var)
{
    //keeps only ints
    $var = secure_var($var);
    return filter_var($var, FILTER_SANITIZE_NUMBER_INT);

}

function secure_var($var)
{
    //secures a string
    $return = addslashes($var);
    $return = htmlentities($return, ENT_COMPAT, "UTF-8");
    return $return;

}

?>
