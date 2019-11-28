
<h1> Produits recherchés </h1>

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
