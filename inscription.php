<?php
	include 'header.php' ;
    require_once 'menu.php' ;
    ?>
    <head>
		<style>

    		h2 {
    			text-align: center;
    		}
    		
    		.inscritpion {
    			max-width: 400px;
    			margin: 0auto;
    			padding: 20px;
    			background-color:#fff;
    			border-radius: 5px;
    			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    		}

    		label {
            display: block;
            margin-bottom: 8px;
        	}

        	input[type="text"],
        	input[type="email"],
        	input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        	}

        	input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        	}

        	input[type="submit"]:hover {
            background-color: #0056b3;
        	}




		</style>
    </head>

<body>

	<div class="inscription">
		<h2>Inscription</h1>
		<form method="post" action="">
			<label for="nom">Nom de compte : </label> <input type="text" name="nom"> <br>
				<br>
			<label for="email">Adresse Mail :</label> <input type="email" name="email" required> <br>
				<br>
			<label for="mdp">Mot de passe (8 characters minimum) : </label><input type="password" name="mdp" minlength="8" required /> <br>
				<br>
			<input type="submit" name="envoyer">Créer le compte</input>
		</form>
	</div>

		<?php
	 if(isset($_POST['envoyer'])) {
        if(empty($_POST['nom'])){


        	echo 'veuillez entrez un nom';
 				}
		else {
			echo 'Champ renseigné <br>';
			$nom = $_POST['nom'];
			$email=$_POST['email'];
			$mdp=$_POST['mdp'];
			$res = insertClient($nom, $email, $mdp);
			echo "$res enregistrement inséré";

		}
        }

            ?>
</body>
</html>