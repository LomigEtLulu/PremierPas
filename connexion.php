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
	
	<div class="connexion">
		<h2>Connexion</h2>
		<form method="post" action="">
			<label for="email">Adresse mail : </label> <input type="email" name="email" required> <br>
				<br>
			<label for="mdp">Mot de passe: </label><input type="password" name="mdp"/> <br>
				<br>
			<input type="submit" name="envoyer"></input>
		</form>
	</div>

	<?php
		if(isset($_POST['envoyer'])) {
			echo "début <br>";
			$email=$_POST['email'];
			$mdp=$_POST['mdp'];
			$res = connectClient($email, $mdp);
			echo "vous êtes connecté: $res";
			session_start();
		}
	?>
</body>
</html>