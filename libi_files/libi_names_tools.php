<?php
// ************************
// LIBI TOOLS FROM NAMES
// GNU GPL ABOVE ALL
// ************************

/**
 * @param string $var take a name and put it in uppercase
 * @return string
 */
function upname($var)
{
    $var = str_replace(
        array(
            'à', 'â', 'ä', 'á', 'ã', 'å',
            'î', 'ï', 'ì', 'í',
            'ô', 'ö', 'ò', 'ó', 'õ', 'ø',
            'ù', 'û', 'ü', 'ú',
            'é', 'è', 'ê', 'ë', 'œ',
            'ç', 'ÿ', 'ñ',
            'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
            'Î', 'Ï', 'Ì', 'Í',
            'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
            'Ù', 'Û', 'Ü', 'Ú',
            'É', 'È', 'Ê', 'Ë',
            'Ç', 'Ÿ', 'Ñ', 'Ŭ', 'Œ',
        ),
        array(
            'a', 'a', 'a', 'a', 'a', 'a',
            'i', 'i', 'i', 'i',
            'o', 'o', 'o', 'o', 'o', 'o',
            'u', 'u', 'u', 'u',
            'e', 'e', 'e', 'e', 'oe',
            'c', 'y', 'n',
            'A', 'A', 'A', 'A', 'A', 'A',
            'I', 'I', 'I', 'I',
            'O', 'O', 'O', 'O', 'O', 'O',
            'U', 'U', 'U', 'U',
            'E', 'E', 'E', 'E',
            'C', 'Y', 'N', 'U', 'OE',
        ), $var);
    $var = strtoupper($var);
    return $var;
}

/**
 * for surnames
 * @param string $prename name to apply
 * @return null|string
 */
function uppername($prename)
{
    if (isset($prename) && !empty($prename)) {
        $prename = upname($prename);
        $prename = utf8_decode($prename);
        //$prename=addslashes($prename);
        $prename = strtolower($prename);
        $total = strlen($prename);
        $prename[0] = utf8_decode(upname(utf8_encode($prename[0]))); //first char in uppercase
        for ($i = 1; $i < $total - 1; $i++) { //for every char of the string (apart from $total-1, and the already done first one)
            if (($prename[$i] == " ") || ($prename[$i] == "'") || ($prename[$i] == "-")) { //if char is  " " or "-"
                $prename[$i + 1] = utf8_decode(upname(utf8_encode($prename[$i + 1]))); //uppercasing the next one
                $i++; //we move
            }

            $prename = utf8_encode($prename);
            /*   $prename = str_replace(
            array(

            'À', 'Â', 'Ä', 'Á', 'Ã', 'Å',
            'Î', 'Ï', 'Ì', 'Í',
            'Ô', 'Ö', 'Ò', 'Ó', 'Õ', 'Ø',
            'Ù', 'Û', 'Ü', 'Ú',
            'É', 'È', 'Ê', 'Ë',
            'Ç', 'Ÿ', 'Ñ', 'Ŭ','Œ',
            ),
            array(
            'à', 'â', 'ä', 'á', 'ã', 'å',
            'î', 'ï', 'ì', 'í',
            'ô', 'ö', 'ò', 'ó', 'õ', 'ø',
            'ù', 'û', 'ü', 'ú',
            'é', 'è', 'ê', 'ë',
            'ç', 'ÿ', 'ñ','ŭ','œ',

            ),$prename);
            */

        }

        return $prename;
    }
    return null;
}

/**
 * Is it a name or a surname?
 * @param string $var name to check
 * @return bool Don't remember what is true lol
 * @todo update doc
 */
function checkstr($var)
{
    // $var=utf8_decode($var);
    $reg = "#^([a-z]+(( )[a-z]+)*)+([-]([a-z]+(( )[a-z]+)*)+)*$#iu";
    if (preg_match($reg, $var)) {
        return true;
    } else {
        return false;
    }

}
?>
