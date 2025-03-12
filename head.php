<!-- 
    Ce fichier contient le début du document HTML et de sa balise <head>
    Il permet de charger le fichier de styles CSS, le JS le cas échéant... 
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Du Professeur Chen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/svg" href="assets/pokeball.svg" />
</head>

<body>
    <header>
        <a href="index.php">
            <h1>Pokedex Du Professeur Chen</h1>
        </a>
        <form id="search-bar" action="search_pokemon.php" method="GET">
            <span class="input-group">
                <!-- J'ai tenté de flex en mettant un petit message si connecté, mais j'ai pas réussi. J'ai du mal avec les variables globales :/-->
                <!-- // if ($connecte == 1){
                //     echo "Vous êtes connecté en tant que " . $row['prenom'] . " " . $row['nom'];
                // } -->
                <input id="q" name="q" type="search" placeholder="Rechercher un pokémon"><button type="submit">🔎</button>
            </span>
        </form>
    </header>

    <div id="main-wrapper">


        <?php
        require_once("menu.php");
        ?>
        <main id="main">