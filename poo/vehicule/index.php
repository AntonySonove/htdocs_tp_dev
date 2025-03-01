<?php
    include "./vehicule.php";
    //* variables
    $voiture= new Vehicule("Mercedes CLK",4,250);
    $moto=new Vehicule("HondaCBR",2,280);

    print_r($voiture);
    print_r($moto);

    //* test fonction detect()
    echo $voiture->detect();
    echo $moto->detect();
    
    //* test fonction boost()
    echo $voiture->boost($voiture);

    //* test fonction plusRapide()
    echo $moto->plusRapide($voiture);
    
?>