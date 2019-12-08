<?php
if(Session::is_admin()){
    echo '<div class="panel_admin">

        <a class="bouton" href="index.php?controller=produit&action=create">Ajouter un produit</a>

    </div>';
}

?>

<h1> Voici nos produits! </h1>

<div class=responsive>
<?php

    foreach ($tab_p as $p) {
        $codeP = $p->get('codeProduit');
        $img_nom =$codeP . '.png';
        echo '<div class=Produit><a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'"><img src="./Images/'.htmlspecialchars($img_nom).'" alt="Erreur d\'affichage d\'image"></a>';
        echo '<div class=desc>'.htmlspecialchars($p->get('nomProduit')).'<br><a>  ' . htmlspecialchars($p->get('prixProduit')) . '€</a></div>';
        echo '</div>';
    }
 ?>
</div>

