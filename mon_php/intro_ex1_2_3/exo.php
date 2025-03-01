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
    </body>
</html>

