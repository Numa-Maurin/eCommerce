<div class= "recherche">
	<?php
    foreach ($tab as $p) {
        $codeP = $p->get('codeProduit');
        $img_nom =$codeP . '.png';
        echo '<div class=Produuit1><a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'"><img src="./Images/'.htmlspecialchars($img_nom).'" alt="Ca fonctionne pas nulos"></a>';
        echo '<div class=desc>'.htmlspecialchars($p->get('nomProduit')).'<br><a>Seulement  ' . htmlspecialchars($p->get('prixProduit')) . '€</a></div>';
        echo '</div>';
    }
?>
</div>