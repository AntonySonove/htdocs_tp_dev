<?php
    include "./abris.php";
    include "./animal.php";
    include "./chien.php";

    $chien=new Chien("Medor","gris",1,2,"long",4);
    var_dump($chien);

    $chien->accoucher();
    $chien->seMultiplier($chien);
    $chien->mettreAuMonde();

    echo "<br><br><br>";

    var_dump($chien->setAbris(new Abris("ma niche")));

    echo "<br><br><br>";

    $chien->getAbris()->abriter();
?>