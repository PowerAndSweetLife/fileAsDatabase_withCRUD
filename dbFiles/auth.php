<?php

	include "../core/Auth.php" ;
	$auth = new Auth() ;
	$path = "users_folder/" ;

	$email = $_POST['email'] ;
	$mdp = $_POST['mdp'] ;

	$auth->setPath($path) ;
	
	if($auth->verifyIfFileExists($email)) {
		$auth->openFile($email) ;
		$auth->getFileContent() ;	
		if($auth->getPassword() == $mdp) {
			echo "Bienvenue !" ;
		}
		else {
			echo "Email ou mot de passe incorrect !" ;
		}
	}
	else {
		echo "Pas membre !" ;
	}

	

