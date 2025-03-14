<?php
require_once("database-connection.php");
require_once("head.php");
session_start(); // Démarre la session


if (!isset($_SESSION['login'])) {
    echo "<p style='color: red;'>Vous devez être connecté pour voir vos Pokémon capturés.</p>";
    exit;
}

$dresseur = $_SESSION['login']; 
?>
<?php
$sql = "
    SELECT p.idPokemon, p.nomPokemon, p.urlPhoto 
    FROM capture c
    JOIN pokemon p ON c.idCapture = p.idPokemon
    WHERE c.dresseur = ?";

$stmt = mysqli_prepare($databaseConnection, $sql);
mysqli_stmt_bind_param($stmt, "s", $dresseur);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<h1>Vos Pokémon capturés</h1>

<?php if (mysqli_num_rows($result) > 0) : ?>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        <?php while ($pokemon = mysqli_fetch_assoc($result)) : ?>
            <div style="text-align: center;">
                <a href="fichepokemon.php?id=<?php echo $pokemon['idPokemon']; ?>">
                    <img src="<?php echo htmlspecialchars($pokemon['urlPhoto']); ?>" 
                         alt="<?php echo htmlspecialchars($pokemon['nomPokemon']); ?>" 
                         style="width: 120px; height: auto;">
                </a>
                <p><?php echo htmlspecialchars($pokemon['nomPokemon']); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>Aucun Pokémon capturé pour le moment.</p>
<?php endif; ?>

<?php require_once("footer.php"); ?>