<?php
	include "../core/FileGenerator.php" ;
	$values = [] ;
	$redirect = "" ;
	$f = new FileGenerator() ;
	if($_GET['option'] == "commentaire") {
		$the_page = "comments_folder/".$_GET['action'] ;
		$nom = $_POST['nom'] ;
		$email = $_POST['email'] ;
		$content = $_POST['comments'] ;
		$values = [$nom,$email,$content] ;
		$redirect = "../".$the_page ;
	}
	else if($_GET['option'] == 'users') {
		$nom = $_POST['nom'] ;
		$email = $_POST['email'] ;
		$mdp = $_POST['mdp'] ;
		$the_page = "users_folder/".$email ;
		$redirect = "../users" ;
		if(!file_exists($the_page)) {
			$values = [$nom,$email,$mdp] ;
			
		}
		else {
			$f->goTo($redirect) ;
		}
		
	$f->createFile($the_page) ;
	$f->addValue($values) ;
	$f->closeFile() ;
	$f->goTo($redirect) ;
