<?php
include_once('Connexion.php');

session_start();
if (!isset($_SESSION['connexion'])) {
    $connexion = new Connexion('localhost','root','root','forum');
    $_SESSION['connexion']=$connexion;

    echo'Actualisez la page §';
}
else {
    echo'<pre>';
    var_dump($_SESSION['connexion']);
    print_r($_SESSION['connexion']);
    echo'</pre>';
}