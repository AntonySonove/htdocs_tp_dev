<?php
    include "./arme.php";
    include "./personnage.php";
    include "./voleur.php";
    include "./guerrier.php";


    //! je déclare ma variable pour récupérer ma classe
    $personnage= new Personnage("Antony","Apprenant Dev",15);
    //? test pour voir si j'ai récupéré ma classe
    var_dump($personnage);
    
    //* test des fonctions get()
    echo"<p>Mon nom est ".$personnage->getNom().", ".$personnage->getDescription()." à ".$personnage->getPointDeVie()." points de vie</p>";

    //* test des fonctions set()
    $personnage->setNom("Sonove")->setPointdeVie(20);

    echo"<p>Mon nouveau nom est ".$personnage->getNom().", et j'ai maintenant ".$personnage->getPointDeVie()." points de vie";

    //* test de la fonction parler
    echo"<p>".$personnage->parler()."</p>";

    echo "<br><br><br>";

    //* création d'un voleur
    $voleur= new Voleur("Vovo","C'est un voleur",15);
    // var_dump($voleur);

    $voleur->devenirInvisible();

    echo "<br><br><br>";

    //* création d'un guerrier
    $guerrier= new Guerrier("Guegue","C'est un guerrier",25,5);
    // var_dump($guerrier);

    $guerrier->defoncerDesMurs();

    echo "<br><br><br>";
    
    //* faire parler les deux personnages
    $voleur->discuter($guerrier);
    $guerrier->discuter($voleur);

    //* equiper une arme
    $voleur->setArme(new Arme("une dague",10));

    //* faire attaquer le voleur avec la dague
    $voleur->getArme()->attaquer($voleur);
?>