<?php
// ************************
// LIBI TOOLS FROM NAMES
// GNU GPL ABOVE ALL
// ************************
function upname($var)
{ //comprends tout ce qui faut pour le name des coureurs : enleve les accents et les met en majuscules
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

function uppername($prename)
{ //met en forme les prenames
    if (isset($prename) && !empty($prename)) {
        $prename = upname($prename);
        $prename = utf8_decode($prename);
        //$prename=addslashes($prename);
        $prename = strtolower($prename);
        $total = strlen($prename);
        $prename[0] = utf8_decode(upname(utf8_encode($prename[0]))); //on met en majuscule le premier caractère
        for ($i = 1; $i < $total - 1; $i++) { //pour tous les caractères de la chaine (sauf la dernière $total-1, et la première qui est déjà fait)
            if (($prename[$i] == " ") || ($prename[$i] == "'") || ($prename[$i] == "-")) { //si le caractère est " " ou "-"
                $prename[$i + 1] = utf8_decode(upname(utf8_encode($prename[$i + 1]))); //on met en caps le caractère qui suit
                $i++; //on saute le caractère qu'on vient de mettre en caps
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

function checkstr($var)
{ //Verification du name/prename
    // $var=utf8_decode($var);
    $reg = "#^([a-z]+(( )[a-z]+)*)+([-]([a-z]+(( )[a-z]+)*)+)*$#iu";
    if (preg_match($reg, $var)) {
        return true;
    } else {
        return false;
    }

}
?>