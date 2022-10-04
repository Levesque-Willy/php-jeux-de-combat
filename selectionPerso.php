<?php
session_start();
require_once 'conf.php';
function changerClass($classe)
{
    // print($classe.'.php');
    require_once $classe . '.php';
}
spl_autoload_register('changerClass');
try {
    $options = array(

        PDO::MYSQL_ATTR_SSL_CA => "E:\\cacert.pem",

    );

    $db = new PDO($dsn, $user, $password, $options);
    $pm = new PersonnagesManager($db);
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php 
    $id = $_GET['id'];
    $perso = $pm->getOne($id);

?>


    <h1>Votre personnage est : <?php print($perso->getNom()) ?></h1>

    <h1>Sélectionnez votre adversaire</h1>


</html>
<table border=1>
    <tr>
        <th>Nom du personnage</th>
        <th>Force</th>
        <th>Experience</th>
        <th>Point de vie</th>
        <th> action </th>

    </tr>
    <form action="selectionPerso.php" method="get">
    <?php
    $personnages = $pm->getList();
   

    foreach ($personnages as $personnage) {
        print('        <tr>');
        print('            <td>' . $personnage->getNom() . '</td>');
        print('            <td style="text-align: center;">' . $personnage->getForce() . '</td>');
        print('            <td style="text-align: center;">' . $personnage->getXp() . '</td>');
        print('            <td style="text-align: center;">' . $personnage->getPv() . '</td>');
        print('            <td style="text-align: center;"><a href="selectionPerso.php?&id='.$personnage->frapper($perso).'">frapper</a></td>');
        print('        </tr>');
    }
    ?>
    </form>
</table></body>