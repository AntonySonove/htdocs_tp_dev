

<?php
    class ViewHome{
        //! attributs
        private ?string $message=""; //? ="" est une valeur par qu'on donne par défaut
        private ?string $userList="";

        //! getter et setter

        public function getMessage(): ?string{
            return $this->message;
        }
        public function setMessage(?string $message): ViewHome{
            $this->message = $message;
            return $this;
        }


        public function getUserList(): ?string{
            return $this->userList;
        }
        public function setUserList(?string $userList): ViewHome{
            $this->userList = $userList;
            return $this;
        }


        //!method
        public function displayView(): ?string{

            return '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <header></header>
            <main>
                <section>
                    <form action=""method="post">
                        <input type="text" name="nickname" placeholder="Pseudo">
                        <input type="text" name="email" placeholder="E-mail">
                        <input type="text" name="password" placeholder="Mot de passe">
                        <input type="submit" name="submit" value="Inscription">
                    </form>
                    <p>'.$this->getMessage().'</p>
                </section>
                <section>
                    <ul>'.$this->getUserList().'</ul>
                </section>  
            </main>
            <footer></footer> 
            </body>
            </html>';

           
        }
    }
?>

