<?php
    include "./vehicule.php";

    $voiture = new Vehicule("Mercedes CLK",250,4);
    $moto = new Vehicule("Honda CBR",280,2);


    $voiture->detect();
    $moto->detect();


    echo "<p> type de véhicule {$voiture->getNom()}</p>";
    echo "<p> type de véhicule {$moto->getNom()}</p>";


    $voiture->boost();
    
    $voiture->plusRapide($moto);
?>