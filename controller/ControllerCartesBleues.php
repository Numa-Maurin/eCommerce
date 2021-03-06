<?php

require_once (File::build_path(array('model', 'ModelCartesBleues.php')));

class ControllerCartesBleues {

	public static $object = "cartesBleues";

	public static function readAll(){

		if (isset($_SESSION['loginUtilisateur'])){
	
			$tab_cartes = ModelCartesBleues::selectByUser();
			$view="list";
			$pagetitle = 'Vos cartes bleues enregistrées';
			require (File::build_path(array('view', 'view.php')));
			
		}else{

			$view="error";
			$pagetitle = "Erreur";
			$error_code = "ReadAll: utilisateur non connecté";
			require (File::build_path(array('view', 'error.php')));
		}
	}


	public static function create (){
	
		if (isset($_SESSION['loginUtilisateur'])){
	
			$tab_user=ModelUtilisateur1::selectAll();
			$view="creerCarte";
			$pagetitle = 'Ajouter une nouvelle carte bleue';
			require (File::build_path(array('view', 'view.php')));

		}else{

			$view="error";
			$pagetitle = "Erreur";
			$error_code = "Create: utilisateur non connecté";
			require (File::build_path(array('view', 'error.php')));
		}
	}

	public static function created(){

			if(Session::is_user($_GET['loginUtilisateur']) || Session::is_admin() ){
                    $u = ModelCartesBleues::select($_GET['code']);
                    if ($u){
                        $view="recard";
                        $pagetitle = 'Reinsertion';
                        require (File::build_path(array('view', 'view.php')));

                    }
                    else{
                        $data = array('codeCarteBleue'=>$_GET['code'],'loginUtilisateur'=>$_GET['loginUtilisateur'],'dateExp'=>$_GET['date'],'cryptogramme'=>$_GET['cryptogramme'],'nomTitulaire'=>$_GET['nom']);
                        $c=new ModelCartesBleues();
                        $c->save($data);
                        self::readAll();
                    }

			}else {
					$view="error";
					$pagetitle = "Erreur";
					$error_code = "Create: permission refusée";
					require (File::build_path(array('view', 'error.php')));
			}
	}

	// Supression d'une carte bleue
	public static function delete (){

		$code = $_GET['code'];
		$c = ModelCartesBleues::select($code);
	
		$login = htmlspecialchars($c->get('loginUtilisateur'));

		if(Session::is_user($login) || Session::is_admin() ){
	
			ModelCartesBleues::delete($code);
			self::readAll();

		}else{
			
			$view="error";
			$pagetitle = "Erreur";
			$error_code = "Delete: permission refusée";
			require (File::build_path(array('view', 'error.php')));
		}

	}

	public static function errorAction() {
		$error_code = 'routeur : action inexistante !';
		$view = 'error';
		$pagetitle = 'Erreur';
		require (File::build_path(array('view', 'error.php')));
    }
}
?>