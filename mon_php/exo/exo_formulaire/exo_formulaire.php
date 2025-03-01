<!DOCTYPE html>
<html lang="fr"></html>
<?php
    //ex20
    $messageEx20="";
    if(isset($_POST["submitEx20"])){
        if(isset($_POST["numberEx20A"]) && is_numeric($_POST["numberEx20A"]) && isset($_POST["numberEx20B"]) && is_numeric($_POST["numberEx20A"])){
            $numberEx20A=$_POST["numberEx20A"];
            $numberEx20B=$_POST["numberEx20B"];
            $messageEx20=$numberEx20A+$numberEx20B;
        }
        else{
            $messageEx20="Les champs ne sont pas remplis";
        }
    }
  

    //ex21
    $prixTtc="";
    if(isset($_POST["submitTtc"])){
        if(isset($_POST["prixHt"]) && !empty($_POST["prixHt"]) && isset($_POST["nbArticle"]) && !empty($_POST["nbArticle"]) && isset($_POST["tva"]) && !empty($_POST["tva"])){
            $prixHt=$_POST["prixHt"];
            $nbArticle=$_POST["nbArticle"];
            $tva=$_POST["tva"];
            $prixTtc="le prix TTC est égal à : ".($prixHt+$prixHt*$tva/100)*$nbArticle."€";
        }
        else{
            $prixTtc="Les champs ne sont pas remplis";
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo Formulaire</title>
</head>
<body>
    <h2>ex20</h2>
    <form action="" method="post">
        <p><input type="number" name="numberEx20A" placeholder="Nombre A"></p>
        <p><input type="number" name="numberEx20B" placeholder="Nombre B"></p>
        <p><input type="submit" name="submitEx20" value="Envoyer"></p>
        <?="<p>$messageEx20</p>"?>
    </form>

    <h2>ex21</h2>
    <form action="" method="post">
        <p><input type="number" name="prixHt" placeholder="Prix HT" step="0.01"></p>
        <p><input type="number" name="nbArticle" placeholder="Nombre d'articles"></p>
        <p><input type="number" name="tva" placeholder="TVA" step="0.01"></p>
        <p><input type="submit" name="submitTtc"></p>
        <?="<p>$prixTtc</p>";?>
    </form>
</body>
</html>