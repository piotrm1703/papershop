<article>
    <h1 style="color:Tomato">Oferta</h1>
</article>
<?php

$tab["product1"] = "<a href=\"/?page=papierypowlekane\"><b>Papiery powlekane</b></a>";
$tab["product2"] = "<a href=\"/?page=kartonyopakowaniowe\"><b>Kartony graficzne</b></a>";
$tab["product3"] = "<a href=\"/?page=kartonygraficzne\"><b>Kartony opakowaniowe</b></a>";
$tab["product4"] = "<a href=\"/?page=papieryetykietowe\"><b>Papiery etykietowe</b></a>";
$tab["product5"] = "<a href=\"/?page=papierysamokopiujace\"><b>Papiery samokopiujące</b></a>";
$tab["product6"] = "<a href=\"/?page=papieroffsetowy\"><b>Papier offsetowy</b></a>";

foreach($tab as $key => $value) {
    echo $value;
    echo '<br>';
}