<?php
    echo "Hello World";
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon premier script PHP</title>
    </head>
    <body>
        <h1>Mon premier script PHP</h1>
        <?php
            echo "<p>coucou</p>";
            // commentaire sur une ligne
            /* commentaire 
            sur plusieurs 
            lignes */
        ?>
        <?php
            // LES VARIABLES
            $maVariable = 10;
            $maVariable = "bonjour";
            echo $maVariable;
            echo "<br/>";

            $monTab = ["salut", 42, "la réponse à l'univers"];
            $monTab2 = array("test", 25, 45); // autre manière de faire un tableau (moins utilisé)
            var_dump($monTab); // affiche le tableau
            echo "<br/>";
            print_r($monTab); // affiche le tableau (moins détaillé)
        ?>
        <?php
            // CONCATENATION
            echo "<h2>" . $maVariable . " On est lundi!</h2>";
            // 2eme méthode
            echo "<h3>$maVariable Prêt?</h3>";
            // Afficher le nom de la variable ("maVariable) : j'ai besoin du caractère d'échapement "\"
            echo "\$maVariable = $maVariable";
            // 3eme méthode
            echo "<h4>{$monTab[1]} euros</h4>";
            echo "<h6>Je vous dis {$maVariable}</h6>";
            echo gettype($maVariable);
            echo "<p>" . gettype($monTab) . "</p>"
        ?>
        <?php
            // FONCTIONS
            function nom_de_la_fonction(){
            echo "Ma fonction";
            }
            echo"<br/>";
            function addition($a,$b){
            $c=$a+$b;
            return $c;;
            }
        ?>
    </body>
</html>