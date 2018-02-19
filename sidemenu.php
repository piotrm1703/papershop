<style>
    .ul-sidemenu {
        list-style-type: none;
        padding: 0;
        width: 200px;
        background-color: cadetblue;
        border-right: 1px solid black;
        float: left;
        margin-right: 20px;
        margin-top: 0;
        margin-bottom: 10px;
    }
    .li-sidemenu {
        text-align: center;
        border-bottom: 1px solid black;
    }
    .li-sidemenu a {
        display: block;
        color: white;
        padding: 8px 8px;
        text-decoration: none;
    }
    .li-sidemenu a:hover:not(.active) {
        background-color: darkslategray;
        color: white;
        opacity: 0.8;
    }
    .li-sidemenu:last-child {
        border-bottom: 1px solid black;
    }
    .li-shoppingCart {
        text-align: center;
        border-bottom: 1px solid black;
        background-color: darkslategray;
        color: white;
    }
    .li-shoppingCart a {
        display: block;
        color: white;
        padding: 8px 8px;
        text-decoration: none;
    }
    .li-shoppingCart a:hover {
        background-color: darkred;
        color: white;
    }
    .li-shoppingCart:last-child {
        border-bottom: 1px solid black;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<ul class="ul-sidemenu">
    <li class="li-sidemenu"><a href="/?page=papierypowlekane"><b>Papiery powlekane</b></a></li>
    <li class="li-sidemenu"><a href="/?page=kartonygraficzne"><b>Kartony graficzne</b></a></li>
    <li class="li-sidemenu"><a href="/?page=kartonyopakowaniowe"><b>Kartony opakowaniowe</b></a></li>
    <li class="li-sidemenu"><a href="/?page=papieryetykietowe"><b>Papiery etykietowe</b></a></li>
    <li class="li-sidemenu"><a href="/?page=papierysamokopiujace"><b>Papiery samokopiujące</b></a></li>
    <li class="li-sidemenu"><a href="/?page=papieroffsetowy"><b>Papier offsetowy</b></a></li>
    <li class="li-shoppingCart"><a href="/?page=shoppingCart"><b>Koszyk</b><i class="fa fa-shopping-cart" style="font-size:20px"></i></a></li>
</ul>
