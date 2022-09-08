<?php

    include_once("Personnage.php");

    $perso1 = new Personage("Mario", 100, 0);
    $perso1->parler()->gagnerExperience()->parler();


    $perso2 = new Personage("Luigi",100 ,0);
    $perso2->parler()->gagnerExperience()->parler();

    $perso1->frapper($perso2);