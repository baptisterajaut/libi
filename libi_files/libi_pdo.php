<?php
// ************************
// LIBI PDO TOOLKIT
// GNU GPL ABOVE ALL
// ************************

/**
 * Generate pdo from $__libi_pdo item
 * @param array $__libi_pdo
 * @return PDO|null
 * @throws Exception
 */
function pdoco(array $__libi_pdo)
{ //gives back a pdo object
    if ($__libi_pdo == null || !isset($__libi_pdo) || !$__libi_pdo['strConnection'])
        throw new InvalidArgumentException('Libi_pdo : Invalid __libi_pdo array parameter given!');
    $pdo=null;
    try {

        $pdo = new PDO($__libi_pdo['strConnection'], $__libi_pdo['user'], $__libi_pdo['password'] /*, $__libi_pdo['arrExtraParam']*/); // Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
    } catch (PDOException $e) {

        trigger_error('Pdo start fatal error at libi\'s pdoco : '. $e->getMessage(),E_USER_WARNING);
    }

    return $pdo;
}


if (!$__libi_config_on) {

    trigger_error('Libi pdo loaded directly',E_USER_WARNING);


    if (!(include realpath(dirname(__FILE__)).'/libi_config.php')) {
        throw new Exception('Pdo module loaded without working config. Aborting.');
    }


}
if($__libi_pdo['auto_pdo']){
    try {
        $pdo = pdoco($__libi_pdo);
    } catch (Exception $ignored) {
    }
}
