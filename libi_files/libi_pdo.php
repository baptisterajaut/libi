<?php
// ************************
// LIBI PDO TOOLKITS
// GNU GPL ABOVE ALL
// ************************
function pdoco($libi_pdo)
{ //gives back a pdo object
    if ($libi_pdo == null)
        die('Libi_pdo : No libi_pdo array parameter Given!');
    try {

        $pdo = new PDO($libi_pdo['strConnection'], $libi_pdo['user'], $libi_pdo['password'] /*, $libi_pdo['arrExtraParam']*/); // Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
    } catch (PDOException $e) {
        $msg = 'Pdo error in ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        echo $msg;
    }
    return $pdo;
}


error_reporting(E_ERROR);
if (!$libi_config_on) {

    echo '<!-- Warning, libi pdo loaded direcly -->';


    if (!(include 'libi_config.php')) {
        die('Pdo module loaded without working config. Aborting.');
    }


}

?>
