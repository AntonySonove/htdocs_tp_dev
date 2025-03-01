<?php
    include "./utilis/functions.php";
    include "./model/model_article.php";
    $bdd=dbConnect();
    $articleList=articleAll($bdd);
    include "./view/header.php";
    include "./view/view_article.php";
    include "./view/footer.php";
?>