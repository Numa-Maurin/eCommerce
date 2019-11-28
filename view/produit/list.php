<?php
if(Session::is_admin()){
    echo '<div class="panel_admin">

        <a class="bouton" href="index.php?controller=produit&action=create">Ajouter un produit</a>

    </div>';
}

?>

<h1> Tous nos produits </h1>

<div id="searchbar">
    <form method="get" action="index.php" id="form">
        
        <input type="hidden" name="controller" value="produit"/>
        <input type="hidden" name="action" value="searched"/>
        <input type="text" placeholder="Nom du produit" name="nomProduit" id="nomProduit_id" required/>
    </form>
</div>

<div class=responsive>
<?php

    foreach ($tab_p as $p) {
        $codeP = $p->get('codeProduit');
        $img_nom =$codeP . '.png';
        echo '<div class=Produit><a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'"><img src="./Images/'.htmlspecialchars($img_nom).'" alt="Ca fonctionne pas nulos"></a>';
        echo '<div class=desc>'.htmlspecialchars($p->get('nomProduit')).'<br><a>Seulement  ' . htmlspecialchars($p->get('prixProduit')) . '€</a></div>';
        echo '</div>';
    }
 ?>
</div>

