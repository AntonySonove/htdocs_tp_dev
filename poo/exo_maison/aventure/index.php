<?php
    include "./arme.php";
    include "./personnage.php";
    include "./voleur.php";
    include "./guerrier.php";

    //! création d'un voleur
    $voleur=new Voleur("Vovo","Alias le voleur volé",15);
    

    //! faire devenir le voleur invisible
    $voleur->devenirInvisible();


    //! création d'un nouveau guerrier
    $guerrier=new Guerrier("Guégué","Le guerrier pas très futé",15,1);
    
    
    //! le faire défoncer un mur
    $guerrier->defoncerDesMurs();
    $guerrier->defoncerDesMurs();
    

    //! faire parler les deux personnages
    $guerrier->parler($voleur,"Salut Vovo!");
    $voleur->parler($guerrier,"Ca va Guégué?");


    //! équiper le voleur avec une dague
    $voleur->setArme(new Arme("Coupe papier",1000000));
    

    $voleur->getArme()->attaquer($voleur);
    ?>