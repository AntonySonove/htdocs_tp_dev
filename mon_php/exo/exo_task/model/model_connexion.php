<?php
    function readUserByEmail($bdd, $email) {
        try {
            $req=$bdd->prepare("SELECT email_user, mdp_user, name_user, id_user, firstname_user FROM users WHERE email_user=(?) LIMIT 1");
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data=$req->fetchAll();
            return $data;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
?>