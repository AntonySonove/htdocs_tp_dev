<?php
    //test si superglobal $_GET existe
    // if(isset($_GET["nom"]) && isset($_GET["prenom"])){
    //     $nom=$_GET["nom"];
    //     $prenom=$_GET["prenom"];
    //     echo"Bonjour $prenom $nom";
    // }
?>
<?php
    // test si superglobal $_POST existe
    if(isset($_POST["nom"]) && isset($_POST["prenom"])){
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        echo"Bonjour $prenom $nom";
    }

?>