<?php

require_once (File::build_path(array('controller', 'ControllerProduit.php')));
require_once (File::build_path(array('controller', 'ControllerUtilisateur1.php')));
require_once (File::build_path(array('controller', 'ControllerCommande.php')));
require_once (File::build_path(array('controller', 'ControllerCartesBleues.php')));

// controller par défaut
$controller_default = 'produit';

// si le controlleur par défaut n'est pas spécifié dans l'URL
// la variable controller contient 'produit'
// sinon la variable contient le controller="..." de l'URL
if(!isset($_GET['controller'])) {
	$controller = $controller_default;
} else {
	$controller = $_GET['controller'];
}

// ucfirst = M le premier caractère en majuscule
// permet de mettre dans controller_class le nom
//du controller utilisé
$controller_class = 'Controller' . ucfirst($controller);

// si la classe controller existe faire
// appliquer l'action readAll par défaut ou appliquer celle
// contenu dans l'URL
if(class_exists($controller_class)){
	
	if(!isset($_GET['action'])) {
		$action = 'readAll';
	}
	else {
		$action = $_GET['action'];
	}

// si l'action existe appliquer la méthode du controller
// action contient le nom de la méthode à appliquer
// get_class_methods récupère toute les méthode de la classe passé
// en argument et les places dans un tableau
// in_array va chercher si $action existe dans ce tableau
// et va renvoyer true si elle existe ou false sinon

//si l'action n'est pas dans la class controlleur
// appliquer la fonction errorAction
	if (isset($action)) {

		$class_methods = get_class_methods($controller_class);

		if(in_array($action, $class_methods)) {
			$controller_class::$action();
		}
		else {
			$controller_class::errorAction();
		}
	}
}

// sinon si le controlleur n'existe pas appliquer la fonction errorClass
// de la classe controllerProduit
else {
	$controller_class = 'ControllerProduit';
	$controller_class::errorClass();
}

?>