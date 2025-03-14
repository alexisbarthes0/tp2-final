<?php
require_once("database-connection.php");
require_once("head.php");
?>
<?php
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
 }
    $sql = "SELECT * FROM Pokemon WHERE idPokemon = $id";
    $result = mysqli_query($databaseConnection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $pokemon = mysqli_fetch_assoc($result);
    }
?>
<table style='width: 100%; border-spacing: 10px;'>
    <h1><?php echo $pokemon['nomPokemon']; ?></h1>
    <img src="<?php echo $pokemon['urlPhoto']; ?>" alt="<?php echo $pokemon['nomPokemon']; ?>" />
    <p><strong>ID Pokémon:</strong> <?php echo $pokemon['idPokemon']; ?></p>
    <p>PV : </strong> <?php echo $pokemon['PV']; ?></p>
    <p>Attaque : <?php echo $pokemon['PtsAttaque']; ?></p>
    <p>Défense : <?php echo $pokemon['PtsDefense']; ?></p>
    <p>Vitesse : <?php echo $pokemon['PtsVitesse']; ?></p>
    <p>Spécial : <?php echo $pokemon['PtsSpecial']; ?></p>


    <input type="submit" name="capture" value="Noter comme capturé">
     <!-- récupération de des éléments de l'ancêtre -->
    <?php

$sqlAncetre = "
    SELECT p.idPokemon, p.nomPokemon, p.urlPhoto 
    FROM evolutions e
    JOIN Pokemon p ON e.idAncetre = p.idPokemon
    WHERE e.idEvolution = $id
";
$resultAncetre = mysqli_query($databaseConnection, $sqlAncetre);
$ancetre = mysqli_fetch_assoc($resultAncetre);

// Récupération des élements de l'évolution
$sqlEvolution = "
    SELECT p.idPokemon, p.nomPokemon, p.urlPhoto 
    FROM evolutions e
    JOIN Pokemon p ON e.idEvolution = p.idPokemon
    WHERE e.idAncetre = $id
";
$resultEvolution = mysqli_query($databaseConnection, $sqlEvolution);
$evolution = mysqli_fetch_assoc($resultEvolution);
?>

<?php if ($ancetre) : ?>
    <h2>Ancêtre</h2>
    <p><strong>ID:</strong> <?php echo $ancetre['idPokemon']; ?></p>
    <p><strong>Nom:</strong> <?php echo htmlspecialchars($ancetre['nomPokemon']); ?></p>
    <a href="fichepokemon.php?id=<?php echo $ancetre['idPokemon']; ?>">
        <img src="<?php echo htmlspecialchars($ancetre['urlPhoto']); ?>" alt="<?php echo htmlspecialchars($ancetre['nomPokemon']); ?>" />
    </a>
<?php endif; ?>

<?php if ($evolution) : ?>
    <h2>Évolution</h2>
    <p><strong>ID:</strong> <?php echo $evolution['idPokemon']; ?></p>
    <p><strong>Nom:</strong> <?php echo htmlspecialchars($evolution['nomPokemon']); ?></p>
    <a href="fichepokemon.php?id=<?php echo $evolution['idPokemon']; ?>">
        <img src="<?php echo htmlspecialchars($evolution['urlPhoto']); ?>" alt="<?php echo htmlspecialchars($evolution['nomPokemon']); ?>" />
    </a>
<?php endif; ?>

 <?php
require_once("footer.php");
?>