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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffering</title>
</head>
<body>
    <?=$monMessage ?>
</body>
</html>