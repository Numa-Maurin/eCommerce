<?php


require_once (File::build_path(array('model','Model.php')));

class ModelAssociationCommande extends Model{

	protected static $primary='idCommande';
	protected static $object = 'associationCommande';

	private $idCommande;
	private $codeProduit;
	private $quantite;
	private $prixTotalPourProduit;

 public function get($nom_attribut) {

    if (property_exists($this, $nom_attribut))
        return $this->$nom_attribut;
    return false;

  }

  // Setter générique (pas expliqué en TD)
  public function set($nom_attribut, $valeur) {

    if (property_exists($this, $nom_attribut))
        $this->$nom_attribut = $valeur;
    return false;

  }

  public function __construct($data = array()) {

	  if (!empty($data)) {
	   
	    $this->idCommande= $data["idCommande"];
	    $this->codeProduit = $data["codeProduit"];
	    $this->quantite=$data["quantité"];
	    $this->prixTotalPourProduit=$data["prixTotalPourProduit"];

	  }
  }


   public static function selectByUser() {

            $sql = "SELECT A.idCommande, codeProduit, quantite, prixTotalPourProduit FROM associationCommande A JOIN commande C ON A.idCommande = C.idCommande WHERE loginUtilisateur=:idUser AND C.idCommande=:idCommande ";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL
           
            $values = array(
                "idUser" => $_SESSION['loginUtilisateur'],
                "idCommande" =>$_GET['codeCommande'],
            );
            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelAssociationCommande");
            $tab_obj = $req_prep->fetchAll();
            return $tab_obj;
    }


}

?>