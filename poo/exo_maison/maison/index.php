<?php
    include "./maison.php";

    //! instancier une maison
    $maison= new Maison("ma maison", 10, 5,1);

    //! appeler la method surface
    echo "<p>la surfece de {$maison->getNom()} est égale à {$maison->surface()} m2</p>";
?>