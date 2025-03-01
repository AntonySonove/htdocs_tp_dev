<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mass Effect</title>
</head>
<body>
    <?php
        $USERS_HUMAN = [[
                "type"=> "humain",
                "name"=> "John Doe",
                "email"=> "j.smith@gmail.com",
                "age"=> 25
            ],
            [
                "type"=> "humain",
                "name"=> "Jane Smith",
                "email"=> "ja.doe@sfr.fr",
                "age"=> 5
            ],
            [
                "type"=> "humain",
                "name"=> "Le Vénérable",
                "email"=> "levy@gmail.com",
                "age"=> 500
            ]
        ];

        $USERS_PET = [[
                "type"=> "animal de compagnie",
                "espece"=> "chien",
                "name"=> "Rox",
                "age"=> 7,
                "propriétaire"=> "John Doe"
            ],
            [
                "type"=> "animal de compagnie",
                "espece"=> "renard",
                "name"=> "Roukie",
                "age"=> 300,
                "propriétaire"=> "Le Vénérable"
            ]
        ];

        $USERS_XENO = [[
                "type"=> "Xeno",
                "espece"=> "Krogan",
                "name"=> "Wrex",
                "menace"=> "Rouge",
                "age"=> 45
            ],
            [
                "type"=> "Xeno",
                "espece"=> "Turien",
                "name"=> "Garrus",
                "menace"=> "Vert",
                "age"=> 35
            ],
            [
                "type"=> "Xeno",
                "espece"=> "Asari",
                "name"=> "Liara",
                "menace"=> "ULTRA Rouge",
                "age"=> 25
            ]
        ];
    ?>
    <!-- ajout des tableaux -->
    <?php
        // création de la variable $tabData
        $tabData=[];
        // Ajout des constantes à $tabData
        array_push($tabData,$USERS_HUMAN, $USERS_PET, $USERS_XENO);
    ?>


    <!-- création des fonctions display -->
    <?php
        function displayHuman($tab){
            foreach($tab as $element){
                echo"<article style = 'border-bottom : 3px solid black'><h2>nom : ".$element["name"]."</h2>
                <p>email : ".$element["email"]."</p>
                <p>age : ".$element["age"]." ans</p></article>";
            }
        }
        function displayPet($tab){
            foreach($tab as $element){
                echo"<article style = 'border-bottom : 3px solid black'><h2>nom : ".$element["name"]."</h2>
                <p>espece : ".$element["espece"]."</p>
                <p>age : ".$element["age"]." ans</p>
                <p>propriétaire".$element["propriétaire"]."</p></article>";
            }
        }
      
        function displayXeno($tab){
            foreach($tab as $element){
                echo"<article style = 'border-bottom : 3px solid black'><h2>nom : ".$element["name"]."</h2>
                <p>espece : ".$element["espece"]."</p>
                <p>age : ".$element["age"]." ans</p>
                <p>niveau de menace : ".$element["menace"]."</p></article>";
            }
        }
    ?>


    <!-- fonction displayUser -->
    <?php 
        // function displayUser($tab) {
        //     foreach($tab as $element){
        //         echo"<article style = 'border-bottom : 3px solid black'><h2>nom : ".     $element["name"]."</h2>
        //         <p>email : ".$element["email"]."</p>
        //         <p>age : ".$element["age"]." ans</p></article>";
        //     }
        // }
        // displayUser($USERS_HUMAN);
    ?>


    <!-- fonction displayUser avec condition -->
    <?php 
        function displayUser($tab) {
            if($tab[0]["type"]="humain"){
                displayHuman($tab);
            }
            else if($tab[1]["type"]="animal de compagnie"){
                displayPet($tab);
            }
            else if($tab[2]["type"]="Xeno"){
                displayXeno($tab);
            }
        }
    ?>
    

    <!-- fonction displayAll -->
    <?php
        function displayAll($tab){
            foreach($tab as $element){
                displayUser($element);
            }
        }
        displayAll($tabData);
    ?>
</body>
</html>