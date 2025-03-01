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
        <br>
        <h2>les variables</h2>
        <?php
            $maVariable = 10;
            $maVariable = "bonjour";
            echo $maVariable."</br></br>";
            $monTab = ["salut", 42, "la réponse à l'univers"];
            $monTab2 = array("test", 25, 45); // autre manière de faire un tableau (moins utilisé)
            var_dump($monTab); // affiche le tableau
            echo "<br/>";
            print_r($monTab); // affiche le tableau (moins détaillé)
        ?>
        <h2>concaténation</h2>
        <?php
            echo"<h5>" . $maVariable . " On est lundi!</h5>";
            // 2eme méthode
            echo "<h6>$maVariable Prêt?</h6>";
            // Afficher le nom de la variable ("maVariable) : j'ai besoin du caractère d'échapement "\"
            echo"\$maVariable = $maVariable";
            // 3eme méthode
            echo "<h4>{$monTab[1]} euros</h4>";
            echo "<h6>Je vous dis {$maVariable}</h6>";
            echo gettype($maVariable);
            echo "<p>" . gettype($monTab) . "</p>"
        ?>
        <h2>Fonctions</h2>
        <?php
            function nom_de_la_fonction(){
            echo "Ma fonction";
            }
            echo"<br/>";
            function addition($a,$b){
            $c=$a+$b;
            return $c;;
            }
        ?>
        <h3>switch case</h3>
        <?php
            $value=5;
            switch($value){
                case 1 :
                    echo "<p>\$value vaut 1";
                    break;
                case 2 :
                    echo "<p>\$value vaut 2";
                    break;
                case 3 :
                    echo "<p>\$value vaut 3";
                    break;
                case 4 :
                    echo "<p>\$value vaut 4";
                    break;
                case 5 :
                    echo "<p>\$value vaut 5";
                    break;
            }
        ?>
        <h3>boucle for</h3>
        <?php
            for($i=0;$i<10;$i++){
                echo"boucle for<br/>";
            }
        ?>
       <h3>boucle while</h3>
        <?php
            $iWhile=0;
            while($iWhile<10){
                echo"boucle while<br/>";
                $iWhile++;
            }
        ?>
        <h3>boucle foreach</h3>
        <?php
            $foreachTab=["valeur1","valeur2","valeur3"];
            foreach($foreachTab as $valeur){
                echo"<li>$valeur</li>";
            }
        ?>
        <h2>tableaux</h2>
        <h3>tableaux indexé</h3>
        <?php
            $tableauIndexe=[
                "propriété" => "valeur",
                "prénom" => "Juste",
                "nom" => "Blanc"
            ];
            foreach($tableauIndexe as $cle => $valeur){
                echo "$cle : $valeur<br/>";
            }
        ?>
        <h4>accéder à une valeur</h4>
        <?php
            echo $foreachTab[0];
            echo "<br/>";
            echo $tableauIndexe["prénom"];
        ?>
        <h3>tableau assiociatif</h3>
        <?php
            $tableauAssiociatif=[
                "propriété" => "valeur",
                "prénom" => "Juste",
                "nom" => "Blanc",
                "note" => [1,2,3]
            ];
            ?>
        <h4>accéder aux valeurs</h4>
        <?php
            echo $tableauAssiociatif["prénom"]."</br></br>";
            print_r($tableauAssiociatif);
            echo "<br/><br/>";
            print_r($tableauAssiociatif["note"]);
            echo "<br/><br/>";
            print_r($tableauAssiociatif["note"][0]);
        ?>
        <h4>ajouter un élément</h4>
        <?php
            $tableauAssiociatif[]=10;
            print_r($tableauAssiociatif);
            echo "<br/><br/>";
            array_push($tableauAssiociatif,20,30,40);
            print_r($tableauAssiociatif);
        ?>
        <h4>ajouter un élément au début du tableau indexé</h4>
        <?php
            array_unshift($tableauIndexe,"nouveau premier");
            print_r($tableauIndexe);
            echo "<br/><br/>";
            $tableauAssiociatif["nouvelle clé"]="c'est la nouvelle clé";
            print_r($tableauAssiociatif);
        ?>
        <h4>modifier une valeur (tableau indexé)</h4>
        <?php
            $tableauIndexe[0]="nouvelle valeur 1";
            print_r($tableauIndexe);
        ?>
        <h4>modifier une valeur (tableau assiociatif)</h4>
        <?php
            $tableauAssiociatif["prenom"]="nouveau prénom";
            print_r($tableauAssiociatif);
        ?>
        <h4>supprimer une valeur</h4>
        <?php  
            array_pop($tableauIndexe); //supprime le dernière valeur
            print_r($tableauIndexe);
            echo "<br/><br/>";
            array_shift($tableauIndexe); //supprime la première valeur
            print_r($tableauIndexe);
        ?>
        <h4>modifier une valeur (tableau assiociatif)</h4>
        <?php
            array_pop($tableauAssiociatif);
            print_r($tableauAssiociatif);
            echo "<br/><br/>";
            array_shift($tableauAssiociatif);
            print_r($tableauAssiociatif);
        ?>
        <h4>parcourir un tableau indexé></h4>
        <?php
            foreach($tableauIndexe as $element){
                echo"$element<br/>";
            }
        ?>
        <h4>parcourir un tableau assiociatif</h4>
        <?php
            foreach($tableauIndexe as $cle => $valeur){
                echo "<p>$cle : $valeur<p>";
            }
        ?>

        <h2>syntaxe alternative</h2>
        <?php 
            $test=false; 
            $message="Bonjour";
            $fruit="pomme";
            $notes=[
                "français"=>9,
                "maths"=>15,
                "svt"=>12
            ];
        ?>
        <h3>syntaxe alternative pour du texte</h3>
        <?="<p>Ce que je veux afficher</p>"?>
        <?=$message ?>

        <h3>syntaxe alternative if</h3>
        <?php if($test) : ?>
            <p>la condition est validée</p>
        <?php else : ?>
            <div>
                <p>c'est pas valide</p>
            </div>
        <?php endif; ?>

        <h3>syntaxe alternative switch</h3>
        <?php switch($fruit) : 
case "pomme": ?>
    <p>c'est une pomme</p>
<?php break; ?>
<?php case "framboise": ?>
    <p>c'est une framboise</p>
    <?php break; ?>
<?php endswitch; ?>

        <h3>syntaxe alternative foreach</h3>
        <?php foreach($notes as $matiere => $note): ?>
            <p>l'élève à eu <?= $note ?> en <?= $matiere ?> </p> 
            <?php endforeach; ?>

        <h3>syntaxe alternative foreach</h3>
        <?php for($i=1;$i<=5;$i++): ?>
            <p>chapitre <?= $i ?></p>
            <?php endfor;?>

        <h2>buffering</h2>
        <?php
            $monMessage="<div><h5>test sans buffering</h5><p>çcamarche bien!</p></div>";
            ob_start(); // permet de mettre en tampon tout le code qui suit
        ?>
        <h5>voyons ce que donne le buffering</h5>
        <p>ca marche aussi!</p>

        <?php 
            $monMessage = ob_get_clean(); // récolte tout le code mis en tampon pour l'assigner à une variable
        ?>
        <?= $monMessage ?>
    </body>
</html>