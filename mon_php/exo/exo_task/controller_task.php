<?php
    include "./model/model_task.php";
    include "./utils/functions.php";
    //* variables
    $taskList="";
    $categoryList="";
    $message="";

    if(isset($_POST["submit"])){
        //* vérifier que les données ne sont pas vides
        if(isset($_POST["name_task"]) && !empty($_POST["name_task"] && isset($_POST["content_task"]) && !empty($_POST["content_task"])) && isset($_POST["date_task"]) && !empty($_POST["date_task"])){
            //* nettoyage des données
            $name_task=nettoyage($_POST["name_task"]);
            $content_task=nettoyage($_POST["content_task"]);
            $date_task=nettoyage($_POST["date_task"]);
            $bdd=dbConnect();
            $message=addTask($bdd,$name_task,$content_task,$date_task);
        }else{
            $message= "<p style='color:red'>*Veuillez remplir les champs obligatoires</p>";
        }
    }
    $bdd=dbConnect();
    $data=taskAll($bdd);
    foreach($data as $task){
        $taskList=$taskList."<div style='border-bottom:1px solid black'>
        <p>Nom : <span style='font-weight:bold'>".$task["name_task"]."</span></p>
        <p>Description : <span style='font-weight:bold'>".$task["content_task"]."</span></p>
        <p>Le : <span style='font-weight:bold'>".$task["date_task"]."</span></p></div>";
    }
    // $bdd=dbConnect();
    // $data=addCategory($bdd);
    // print_r($data);
    // $menage=$data[0]["name_category"];
    // echo $menage;
    
    include "./controller_header.php";
    include "./view/view_task.php";
    include "./view/footer.php";
?>