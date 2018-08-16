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
    if ($__libi_pdo == null || !isset($__libi_pdo))
        throw new InvalidArgumentException('Libi_pdo : No __libi_pdo array parameter Given!');
    $pdo=null;
    try {

        $pdo = new PDO($__libi_pdo['strConnection'], $__libi_pdo['user'], $__libi_pdo['password'] /*, $__libi_pdo['arrExtraParam']*/); // Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
    } catch (PDOException $e) {
        $msg = 'Pdo fatal error at libi\'s pdoco : '. $e->getMessage();
        echo $msg;
    }

    return $pdo;
}


error_reporting(E_ERROR);
if (!$__libi_config_on) {

    trigger_error('Libi pdo loaded directly',E_USER_WARNING);


    if (!(include realpath(dirname(__FILE__)).'/libi_config.php')) {
        throw new Exception('Pdo module loaded without working config. Aborting.');
    }


}
if($__libi_pdo['auto_pdo']){
    $pdo=pdoco($__libi_pdo);
}
