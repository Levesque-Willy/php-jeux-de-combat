<?php

    function changerClass($classe){
        require $classe. '.php';
    }
    spl_autoload_register('changerClass');

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
    

/*
    $perso1->parler();
    $perso2->parler();

    print($perso1);
    print($perso2);
*/