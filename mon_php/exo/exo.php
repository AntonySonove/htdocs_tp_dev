<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exo</title>
    </head>
    <body>
        <?php
            echo"<h3>Exercice 2</h3>";
            $a = 10;
            $b = 12;
            $total = $a + $b;
            echo "<p> le total est : ".$total."</p>";
        ?>
        <?php
            echo"<h3>Exercice 3</h3>";
            $prixHt = 100;
            $tva = 20;
            $quantite = 5;
            $prixTotalTtc = $prixHt * $quantite * (1 + $tva/100);
            echo "<p> le prix total TTC est : ".$prixTotalTtc."</p>";
        ?>
        <?php
            echo"<h3>Exercice 4</h3>";
            function soustraction($a,$b){
            $c=$a-$b;
            return $c;
            }
            echo "<p> la différence est : ".soustraction(12,10)."</p>";
        ?>
        <?php
            echo"<h3>Exercice 5</h3>";
            // echo "<p>l'arrondi de 5,2 est : ".intval(5.2)."</p>";
            // echo"<br/>";
            function arrondi($float){
                return round ($float);
            }
            echo "<p>l'arrondi de 5,6 est : ".arrondi(5.6)."</p>";
        ?>
        <?php
            echo"<h3>Exercice 6</h3>";
            function troisValeurs($a,$b,$c){
                $somme=$a+$b+$c;
                return $somme;
            }
            echo "<p> la somme des trois valeurs est : ".troisValeurs(1,1,1)."</p>";
            
        ?>
        <?php
            echo"<h3>Exercice 7</h3>";
            function moyenneTroisValeurs($a,$b,$c){
                // $somme=$a+$b+$c;
                $somme=troisValeurs($a,$b,$c);
                $moyenne=$somme/3;
                return $moyenne;
            }
            echo "<p> la moyenne est : ".moyenneTroisValeurs(1,2,3)."</p>";
        ?>
        <?php
            echo"<h3>Exercice 8</h3>";
            function testNegPos($a){
                // vérifier le type
                if (gettype($a)!="integer" && gettype($a)!="double"){
                    echo"<p>\$a n'est pas un nombre";
                    return;
                }
                if ($a>0){
                    echo"<p>\$a est positif";
                }
                else if ($a==0){
                    echo"<p>\$a est positif et négatif à la fois";
                }
                else{
                    echo"<p>\$a est négatif";
                }
                
            }
            echo testNegPos("e");
        ?>
        <?php
            echo"<h3>Exercice 9</h3>";
            function lePlusGrand ($a,$b,$c){
                // vérifier le type
            if ((gettype($a)!="integer" && gettype($a)!="double")||(gettype     ($b)!="integer" && gettype($b)!="double")||(gettype($c)!="integer" && gettype($c)!="double")){
                echo"<p>\$a n'est pas un nombre";
                return;
                }
                if ($a>$b && $a>$c){
                    echo"<p>\$a est le plus grand </p>";
                }
                if ($b>$a && $b>$c){
                    echo"<p>\$b est le plus grand </p>";
                }
                if ($c>$b && $c>$a){
                    echo"<p>\$c est le plus grand </p>";
                }
            }
            lePlusGrand(5,2,7);
        ?>
        <?php
            echo"<h3>Exercice 10</h3>";
            function lePlusPetit ($a,$b,$c){
                // vérifier le type
            if ((gettype($a)!="integer" && gettype($a)!="double")||(gettype     ($b)!="integer" && gettype($b)!="double")||(gettype($c)!="integer" && gettype($c)!="double")){
                echo"<p>\$a n'est pas un nombre";
                return;
                }
                else if ($a<$b && $a<$c){
                    echo"<p>\$a est le plus petit</p>";
                }
                else if ($b<$a && $b<$c){
                    echo"<p>\$b est le plus petit </p>";
                }
                else if ($c<$b && $c<$a){
                    echo"<p>\$c est le plus petit </p>";
                }
            }
            lePlusPetit(5,2,7);
        ?>
        <?php
            echo"<h3>Exercice 11</h3>";
            function categorieEnfant($age){
                if (gettype($age)!="integer" && gettype($age)!="double"){
                    echo"<p>\$a n'est pas un nombre";// vérifier qu'il s'agit bien d'un nombre
                    return;
                    }
                    switch($age){
                        case $age>=6 && $age<8 :
                            echo "<p>Poussin";
                            break;
                        case $age>=8 && $age<10 :
                            echo "<p>Pupille";
                            break;
                        case $age>=10 && $age<12 :
                            echo "<p>Minime";
                            break;
                        case $age>=12 :
                            echo "<p>Cadet";
                            break;
                        default :
                            echo "<p>pas l'âge requis";
                        break;
                    }
            }
            categorieEnfant(1);
        ?>
        <?php
            echo"<h3>Exercice 12</h3>";
            $tabEx12=[1,2,3,8];
            function valeurHauteTab($tab){
                $comparateur=$tab[0];
                foreach($tab as $element){
                    if($comparateur<$element){
                        $comparateur=$element; 
                    } 
                }
                return $comparateur;
            }
            echo"la valeur la plus grande est : ". valeurHauteTab($tabEx12);
        ?>
        <?php
            echo"<h3>Exercice 14</h3>";
            function valeurBasseTab ($tab){
                $comparateur=$tab[0];
                foreach($tab as $element){
                    if($comparateur>$tab[0]){
                        $comparateur=$element;
                    }
                }
                return $comparateur;
            }
            echo"la valeur la plus petite est : ".valeurBasseTab($tabEx12);
        ?>
        <?php
            echo"<h3>Exercice 13</h3>";
            function moyenneTab($tab){
                $somme=0;
                foreach($tab as $element){
                    $somme+=$element;
                }
                $somme=$somme/count($tab);
                return $somme;
            }
            echo"la moyenne est : ".moyenneTab($tabEx12);
        ?>
        <?php
            echo"<h3>Exercice 15</h3>";
            function unACinq(){
                for($i=1;$i<6;$i++){
                    echo $i."</br>";
                }
            }
            unAcinq();
        ?>
         <?php
            echo"<h3>Exercice 16</h3>";
            function ajouterNombre($nbr){
                for($i=1;$i<11;$i++){
                    echo $nbr+$i."</br>";
                }
            }
            ajouterNombre(1);
        ?>
         <?php
            echo"<h3>Exercice 17</h3>";
            function afficheChaqueCase($tab){
                foreach($tab as $element){
                    echo"$element</br>";
                }
            }
            afficheChaqueCase($tabEx12);
        ?>
         <?php
            echo"<h3>Exercice 18</h3>";
            $bigTab = [[1,2,3],[4,5,6],[7,8,9]];
            function affichePetitTab($tab){
                
                foreach($tab as $element){
                    print_r($element);
                    
                    echo"</br>";
                }
            }
            affichePetitTab($bigTab);
        ?>
         <?php
         echo"<h3>Exercice 19</h3>";
            function afficheChaqueNombrePetitTab($tab){
                foreach($tab as $element){
                    foreach($element as $elementNombre){
                        echo $elementNombre;
                        echo"</br>";
                    } 
                }
                echo"</br>";
            }
            afficheChaqueNombrePetitTab($bigTab);
            function afficheChaqueNombrePetitTabFor($tab){
                $compteur=0;
                for($i=0;$i<count($tab);$i++){
                    for($j=0;$j<count($tab[$i]);$j++){
                        print_r($tab[$i][$j]);
                        echo"</br>";
                    }
                }
            }
            afficheChaqueNombrePetitTabFor($bigTab);
        ?>
    </body>
</html>

