<?php
// ************************
// LIBI VARIABLES SECURERS
// GNU GPL ABOVE ALL
// ************************
/**
 * Simple serucirty
 * @param $var
 * @return string
 */
function secure_var($var)
{
    //secures a string
    $return = addslashes($var);
    $return = htmlentities($return, ENT_COMPAT, "UTF-8");
    return $return;

}

/**
 * Sends something which in in post and send it in session <br/>
 * If post is empty, send which is in session <br/>
 * Else If session is empty, returns false <br/>
 * @param string $name variable name
 * @return bool|string
 */
function posta($name)
{

    if (array_key_exists($name,$_POST) && $_POST[$name] !== ""){
        $return = secure_var($_POST[$name]);
        $_SESSION[$name] = $return;
        return $return;
    } else {
        if (isset($_SESSION[$name]) && !empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    return false;

}

/**
 * Only keeps int
 * @param $var
 * @return mixed
 */
function filter_int($var)
{
    $var = secure_var($var);
    return filter_var($var, FILTER_SANITIZE_NUMBER_INT);

}

/**
 * fetch post variable and secures it
 * @param $name
 * @return bool|string
 */
function post($name)
{
    if (array_key_exists($name,$_POST) && $_POST[$name] !== ""){
        return secure_var($_POST[$name]);
    } else
        return false;

}

/**
 * fetch post var.
 * @param $name
 * @return bool|string
 */
function posts($name)
{

    if (array_key_exists($name,$_POST)&& $_POST[$name] !== "")
        return $_POST[$name];
    else
        return false;
}

/** fetch get var and secures it
 * @param $name
 * @return bool|string
 */
function get($name)
{
    if (array_key_exists($name,$_GET) && $_GET[$name] !== "") {
        return secure_var($_GET[$name]);

    } else
        return false;

}

/** fetch get var.
 * @param $name
 * @return bool|string
 */
function gets($name)
{ //
    //it gives back false, so you dont have to check if empty or not

    if (array_key_exists($name,$_GET)&& $_GET[$name] !== "") 
        return $_GET[$name];
    else
        return false;
}

/**
 * Get the part of the path you want
 * @param $index
 * @param string $delimiter
 * @return bool
 */
function path_info($index,$delimiter='/'){
	if(empty($_SERVER['PATH_INFO']))
		return false;
	$ret=explode($delimiter,$_SERVER['PATH_INFO']);
	return $ret[$index+1];
}

?>
