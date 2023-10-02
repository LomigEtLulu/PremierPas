<?php
            function getConnection() {
                try {
                    $connexion = new PDO("mysql:host=localhost;dbname=lafleurv2;charset=utf8", 'utilfleur', 'secret');
                }
                catch(PDOException $e)
                    {
                    die($e->getMessage());
                    }
                return $connexion ;
            }

        function getCategories() {
             $connexion = getConnection();
             $stm = $connexion->query("SELECT cat_code, cat_libelle FROM categorie");
             $categories=$stm->fetchAll();
             return $categories ;
            }

            function getProduits($cat) {
                $connexion = getConnection();
                $stm = $connexion->prepare("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image
                                            FROM produit where pdt_categorie = :cat");
                $stm->bindParam(':cat', $cat, PDO::PARAM_INT);
                $stm->execute();
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function getTousProduits() {
                $connexion = getConnection();
                $stm = $connexion->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image FROM produit");
                $produits=$stm->fetchAll();
                return $produits ;

            }

            function insertClient($nom, $mail, $mdp){

                $mdp =password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $sql= 'INSERT INTO client(nomClient, mailClient, mdpClient) VALUES (:nom, :mail,:mdp)';

                $connexion =getConnection();
                $stm = $connexion->prepare("INSERT INTO client(nomClient, mailClient, mdpClient) VALUES (:nom,:mail,:mdp)");
                $stm->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stm->bindParam(':mail', $mail, PDO::PARAM_STR);
                $stm->bindParam(':mdp', $mdp, PDO::PARAM_STR);
                $res= $stm->execute();
            
                echo "insertion fini <br>";
                return $res;

            }

            function connectClient( $email, $mdp) {

                $connexion = getConnection();

                $sql = "SELECT * FROM client WHERE mailClient = :email";
                $stm = $connexion->prepare($sql);
                $stm->bindParam(':email', $email, PDO::PARAM_STR);
                $res= $stm->execute();
                if ($res) {
                    $user=$stm->fetch(PDO::FETCH_ASSOC);
                    $hash=$user['mdpClient'];
                    echo "voici le mot de passe haché : $mdp <br>";
                }

                echo "connexion établie <br>";
                return $res;




        
                
            }
            
            





           



           


    ?>  


