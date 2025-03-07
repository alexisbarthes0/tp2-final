<!-- 
    Ce fichier représente la page de résultats de recherche de pokémons du site.
-->
<?php
require_once("head.php");
?>
<?php
require_once("database-connection.php")
?>

<?php
// $q = $_POST['q'];

// $sql = "SELECT * FROM pokemon WHERE nomPokemon = '$q' ORDER BY idPokemon ASC";
// $result = mysqli_query($databaseConnection, $sql);

// echo "<table style='width: 100%; border-spacing: 10px;'>"; // Une table toute simple

// $count = 0; // Compteur pour gérer les colonnes

// if(mysqli_num_rows($result) > 0){
// while($row = mysqli_fetch_assoc($result)){
    
//     if ($count % 4 == 0 && $count > 0) { 
//         echo "</tr><tr>";  // On créé une ligne tout les 4 pokémons
//     }
//     echo "<td style='width: 25%; text-align: center;'>"; //Chaque pkmn prends 1/4 de la ligne et le texte est aligné
//     echo "<img src='" . $row["urlPhoto"] . "' alt='" . $row["nomPokemon"] . "' />"; //Affichage de la photo
//     echo "<p>" . $row["nomPokemon"] . "</p>"; //Affichage du nom
//     echo "<p>" . $row["idPokemon"] . "</p>"; //Affichage du premier type
//     // echo "<p>" . $row["nomType2"] . "</p>"; //Affichage du second type de ses mort jpp
//     echo "</td>"; // On balance UN SEUL pokémon avec noms images et id

//     $count++; // On rajoute un au compteur et comme ça quand on arrive à 4 beh ça revient à la ligne enft
// }
// echo "</tr>"; 
// echo "</table>";
// }
$recherche = $_GET["q"];
$sql= "SELECT * FROM pokemon WHERE nomPokemon LIKE '%' .recherche.'%'";

$databaseConnection->query($sql)->fetch_all();
?> 
<?php
require_once("footer.php");
?>