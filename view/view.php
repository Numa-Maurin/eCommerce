<!DOCTYPE html>
<html lang="fr">
<head>

	<!--Hors de page-->
	<link rel="icon" href="Images/logo.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./styles.css">
	<title><?php echo $pagetitle; ?></title>		<!--Titre affiché sur l'onglet-->



</head>

<!--Corps de page (propre à chaque page)-->

<!--Pour l'en-tête de page-->
<header>
	<nav> <!--Menu-->
		<div class=menu_burger>
			<a> <img class = "responsive-img" src="./Images/logo.png " alt="Ca fonctionne pas nulos" id="logobg"></a>
			<div class="submenu_bg">
				<div><a class=txt_sub href="index.php">Accueil</a></div>
				<br>
				<div><a class=txt_sub href="index.php?action=readAll&controller=produit">Produits</a></div>
				<div><a class=txt_sub href="index.php?action=show_panier&controller=utilisateur1">Panier</a></div>
				<?php
				if(Session::is_admin()) {
					echo '<div><a class=txt_sub href="index.php?action=readAll&controller=utilisateur1">Utilisateurs</a></div>
					<div><a class=txt_sub href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				}
				else if (isset($_SESSION['loginUtilisateur'])){
					echo '<div><a class=txt_sub href="index.php?action=read&controller=utilisateur1&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
					<div><a class=txt_sub href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				}

				if(isset($_SESSION['loginUtilisateur'])) {
					echo ('<div><a class=txt_sub href="index.php?controller=utilisateur1&action=deconnect">Se déconnecter</a></div>');
				}
				else {
					echo ('<div><a class=txt_sub href="index.php?action=create&controller=utilisateur1">S\'inscrire</a></div>
						<div><a class=txt_sub href="index.php?action=connect&controller=utilisateur1">Se connecter</a></div>');
				}
				?>
			</div>
		</div>


		<div class=menu>
			<a href="index.php"><img src="./Images/logo.png" alt="Ca fonctionne pas nulos" id="logo"></a>

			<?php 


			if(Session::is_admin()) {

				echo '<div class=title_menu><a class=txt_menu_admin >Mode Admin</a></div>';


			}

			?>

			<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=produit">Produits</a></div>
			<div class=title_menu><a class=txt_menu href="index.php?action=show_panier&controller=utilisateur1">Panier</a></div>
			<?php


			if(Session::is_admin()) {

				echo '<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=utilisateur1">Gestion utilisateurs</a></div>';

			}

			if(isset($_SESSION['loginUtilisateur'])){
				echo '<div class=title_menu><a class=txt_menu href="index.php?action=read&controller=utilisateur1&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
				<div class=title_menu><a class=txt_menu href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				
				echo ('<div class=title_menu><a class=txt_menu href="index.php?controller=utilisateur1&action=deconnect">Se déconnecter</a></div>');
			}else {
				echo ('<div class=title_menu><a class=txt_menu href="index.php?action=create&controller=utilisateur1">S\'inscrire</a></div>
					<div class=title_menu><a class=txt_menu href="index.php?action=connect&controller=utilisateur1">Se connecter</a></div>');
			}
			?>
			<form class ="search" method="GET">
				<input type="hidden" name="action" value="search"/>
				<input type="search" name="data" placeholder="Recherche..."/>
				<input class=bouton_recherche type="submit" value="Valider" />
			</form>
		</div>

	</nav>
</header>

<main>


	<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
	$filepath = File::build_path(array("view", self::$object, "$view.php"));
	require $filepath;
	?>
</main>

<footer>
	<div class="FootBot">
		<div class="FootBotC1">
			<div>
				<a> <img class = "responsive-img " src="./Images/Smartyou.png" alt="Erreur 2ème logo" id="Footlogo"></a>
			</div>
		</div>
		<div class="FootBotC3">
			<h1>Vous cherchez un Smartphone, vous etes au bon endroit</h1>
			<h1>Apple, Samsung, Xiaomi...</h1>
			<h5>Ils sont tous disponibles chez nous !!</h5>
		</div>
		<div>
			<div class="footerSocialIcons">
				<h4 class="">Suivez nous :</h4>
				<div class="social-icons">
					<a href="https://www.instagram.com/?hl=fr" class="social-icon"> <img class="icon" src="./Images/insta.png" alt="ca marche pas"></i></a>
					<a href="https://fr-fr.facebook.com/" class="social-icon"> <img class="icon" src="./Images/fb.png" alt="ca marche pas"></i></a>
					<a href="https://www.twitter.com/" class="social-icon"> <img class="icon"src="./Images/twitter.png" alt="ca marche pas"></i></a>
				</div>
			</div>
		</div>
	</div>
	<p>

	</footer> 
	</html>



