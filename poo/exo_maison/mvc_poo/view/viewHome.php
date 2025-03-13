<?php
    class ViewHome{

        //! attributs
        private ?string $message="";
        private ?string $userList="";


        //! getter et setter
        public function getMessage(): ?string{
            return $this->message;
        }
        public function setMessage(string $message): ViewHome{
            $this->message=$message;
            return $this;
        }
        public function getUserList(): ?string{
            return $this->userList;
        }
        public function setUserList(string $userList): ViewHome{
            $this->userList=$userList;
            return $this;
        }


        //! method
        public function displayView():?string{
            return '<!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>MVC_POO</title>
            </head>
            <body>
                <header></header>
                <main>
                    <section>
                        <form action="" method="post">
                            <p><input type="text" name="nickname" placeholder="Pseudo"></p>
                            <p><input type="email" name="email" placeholder="E-mail"></p>
                            <p><input type="password" name="password" placeholder="Mot de passe"></p>
                            <p><input type="submit" name="submit" value="Inscription"></p>
                            <p>'.$this->getMessage().'</p> <!-- //! mal tapé ($message) -->
                        </form>
                    </section>
                    <section>
                        <ul>
                            '.$this->getUserList().' <!-- //! mal tapé ($userList) -->
                        </ul>
                    </section>
                </main>
                <footer></footer>  
            </body>
            </html>';
        }
    }
?>
