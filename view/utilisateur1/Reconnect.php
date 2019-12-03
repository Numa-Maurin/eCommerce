<form method="get" action="index.php">
  <fieldset>
    <legend><?php echo htmlspecialchars($type)?></legend>
      
      <?php 

      $controller = static::$object;
      echo('<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'"/>');

     
      if($_GET['action'] === 'created') {
        echo('
          <p> Déterminer un login authentique car celui-ci est déjà utilisé </p>
        <input type="hidden" name="action" value="created"/>
        <input type="text" placeholder="Login" name="loginUtilisateur" id="loginUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['nomUtilisateur']).'" name="nomUtilisateur" id="nomUtilisateur_id" required/>
        <input type="text" value="'.htmlspecialchars($_GET['prenomUtilisateur']).'" name="prenomUtilisateur" id="prenomUtilisateur_id" required/>
        <br>
        <label>Adresse de facturation:</label>
        <br>
        <textarea name="adresseFacturationUtilisateur" id="adresseFacturationUtilisateur_id" > '.htmlspecialchars($_GET['adresseFacturationUtilisateur']).'</textarea>
        <br>
        <label>Adresse de livraison:</label>
        <br>
        <textarea name="adresseLivraisonUtilisateur" id="adresseLivraisonUtilisateur_id" > '.htmlspecialchars($_GET['adresseLivraisonUtilisateur']).' </textarea>
        <br>
        <input type="password" value="'.htmlspecialchars($_GET['passUtilisateur']).'" placeholder="Mot de passe" name="passUtilisateur" id="passUtilisateur_id" required/>
        <input type="password" value="'.htmlspecialchars($_GET['vpassUtilisateur']).'" placeholder="Confirmer le mot de passe" name="vpassUtilisateur" id="vpassUtilisateur_id" required/>
        <input type="email" value="'.htmlspecialchars($_GET['emailUser']).'" name="emailUser" id="emailUser_id" />');   
      }  
      ?>
    <p>
      <input class="submit_btn" type="submit"value="Enregistrer" />
    </p>
  </fieldset> 
</form>