<?php
include "./maison.php";
    //* variables
    $maison=new Maison("maison d'Anto",10,10,2);

    //?test
    var_dump($maison);

    //* appel dela fonction surface()
    echo"</p>La surface de la {$maison->getNom()} est : {$maison->surface()}m²"
?>