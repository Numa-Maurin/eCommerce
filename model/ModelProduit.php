<?php
require_once (File::build_path(array('model','Model.php')));

class ModelProduit extends Model
{

    protected static $primary = 'codeProduit';
    protected static $object = 'produit';

    private $codeProduit;
    private $nomProduit;
    private $prixProduit;
    private $descProduit;
    private $stockProduit;

    // Getter générique 
    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique 
    public function set($nom_attribut, $valeur)
    {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // constructeur
    public function __construct($data = array())
    {
        if (!empty($data)) {

            $this->nomProduit = $data["nomProduit"];
            $this->prixProduit = $data["prixProduit"];
            $this->descProduit = $data["descProduit"];
            $this->stockProduit = $data["stockProduit"];
        }
    }

    public static function search($data)
    {
        $sql = "SELECT * FROM produit WHERE nomProduit LIKE :nom_tag OR prixProduit LIKE :nom_tag ORDER BY codeProduit DESC";
        $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL

        $values = array(
            "nom_tag" => '%' . $data . '%',
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, ModelProduit);
        $tab_obj = $req_prep->fetchAll();
        if (empty($tab_obj)) {
            return false;
        }
        return $tab_obj;
    }
}

?>
