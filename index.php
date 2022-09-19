<?php
require_once 'conf.php';

    function changerClass($classe){
        require_once $classe. '.php';
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
    
    $db = new PDO($dsn,$user,$password,$options);
    if ($db){
        print('<br/>Lecute dans la base de données :');
        $request = $db->query('SELECT id,nom, `force`,pv,niveau,xp FROM personnages;');

        while($ligne = $request->fetch(PDO::FETCH_ASSOC))
        {
            print('<br/>'.$ligne['nom'].'a'.$ligne['force'].
            'de force'.$ligne['pv'].'de point de vie,'.$ligne['experience'].'d\'experienxe et est au nieau'
            .$ligne['niveau']);
        
        }
    }
}catch(PDOException $e){
    print('<br/>Erreur de connexion : '.$e->getMessage());
}