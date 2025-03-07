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





 
 <?php
require_once("footer.php");
?>