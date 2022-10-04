<?php
require_once 'conf.php';

function changerClass($classe)
{
    // print($classe.'.php');
    require_once $classe . '.php';
}
spl_autoload_register('changerClass');
/*
    $perso1 = new Personnage("Mario",personnage::FORCE_PETIT);
    $perso2 = new Personnage("Luigi",personnage::FORCE_GRAND);

    $personnages = array($perso1,$perso2);

foreach($personnages as $perssonage){
    $perssonage->gagnerExperience()->parler();
}
    print($perso1);
    print("mario frape luigi<br/>");
    $perso1->frapper($perso2);
    
    print($perso2);
    $perso2->frapper($perso1);
    $perso2->frapper($perso1);
    print("luigi enchaine mario <br/>");

    print($perso1);
    
*/
/*
    $perso1->parler();
    $perso2->parler();

    print($perso1);
    print($perso2);
*/


try {
    $options = array(

        PDO::MYSQL_ATTR_SSL_CA => "E:\\cacert.pem",

    );

    $db = new PDO($dsn, $user, $password, $options);
    $pm = new PersonnagesManager($db);
    /*
    $perso1 = new Personnage(array('nom' => 'Mathis', 'pv' => 250, 'force' => 20, 'xp' => 0));
    $pm->add($perso1);
    $perso2 = new Personnage(array('nom' => 'Clement', 'pv' => 300, 'force' => 50, 'xp' => 0));
    $pm->add($perso2);
    $perso3 = new Personnage(array('nom' => 'Eva', 'pv' => 30000, 'force' => 80, 'xp' => 0));
    $pm->add($perso3);
    $perso4 = new Personnage(array('nom' => 'Martin', 'pv' => 100, 'force' => 50, 'xp' => 0));
    $pm->add($perso4);
    */

    /*if ($db){
        print('<br/>Lecute dans la base de données :');
        $request = $db->query('SELECT id ,nom, `force`,pv,xp FROM personnages;');

        while($ligne = $request->fetch(PDO::FETCH_ASSOC))
        {
           /* print('<br/>'.$ligne['nom'].' a '.$ligne['force'].
            ' de force '.$ligne['pv'].' de point de vie, '.$ligne['xp'].' d\'experienxe');
            $perso = new Personnage($ligne);
            print('<br/>'. $perso->getNom().' a ('.$perso->getForce().') de force ('. $perso->getPv().')point de vie est a ('. $perso->getXp().') d\'experience');
        
        }
    }*/
} catch (PDOException $e) {
    print('<br/>Erreur de connexion : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de combat</title>
</head>

<body>
    <h1>Jeu de combat</h1>

    <table border=1>
        <tr>
            <th>Nom du personnage</th>
            <th>Force</th>
            <th>Experience</th>
            <th>Point de vie</th>             
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
            print('            <td style="text-align: center;"> <a href="selectionPerso.php?id=' . $personnage->getId() . '">select</a></td>');
            print('        </tr>');
        }
        ?>
        </form>
    </table>
    
</body>

</html>