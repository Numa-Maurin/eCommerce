<h1>Reinsérer votre véritable code</h1>
<form id="form_cb" method="GET" action='./index.php?'>
	<input type="hidden" name="controller" value="cartesBleues">

	<input type="hidden" name="action" value="created">

	<?php

		if(Session::is_admin()){

			echo ' 

				<label> Login utilisateur : </label>

				 <select name="loginUtilisateur" required />

						';

							foreach($tab_user as $u) {

							  $value = htmlspecialchars($u->get('loginUtilisateur')) 	;					

							 echo' <option value="'.$value.'"' .'>'.$value.'</option>';
						
							}

						


				echo '</select> <br>';



		}else{

			echo '<input type="hidden" name="loginUtilisateur" value="' . htmlspecialchars($_SESSION['loginUtilisateur']) .'">' ;

		}

	
echo( '
	<label>Code Carte Bleue:</label>
	<br>
	<input type="number" name="code" required >
	<br>
	<label>Date d\'expiration (MM/AA): </label>
	<br>
	<input type="date" name="date" value="'.htmlspecialchars($_GET['date']).'"  required maxlength="5" >
	<br>
	<label>Cryptogramme:</label>
	<br>
	<input type="number" name="cryptogramme" value="'.htmlspecialchars($_GET['cryptogramme']).'"max="999" required >
	<br>
	<label>Nom du titulaire:</label>
	<br>
	<input type="text" name="nom" value="'.htmlspecialchars($_GET['nom']).'" required>

	<input class="submit_btn" type=submit value="Enregistrer"> ');

	?>
</form>
