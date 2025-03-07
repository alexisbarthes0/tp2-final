<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
-->
<?php
require_once("database-connection.php")
?>
<?php
require_once("head.php");
// Vérifie  connection
// if (!$databaseConnection) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
//   echo "<p>" . "Connected successfully" . "</p>" ;
// ?>
<!-- <pre>
    &lt;
    A REMPLACER PAR VOTRE CODE POUR CHARGER ET AFFICHER DANS UN TABLEAU LA LISTE DES POKEMONS PAR LEUR NOM.
    CHAQUE POKEMON DOIT ETRE CLIQUABLE POUR NAVIGUER SUR UNE PAGE OU L'ON AFFICHE SON IMAGE ET L'ENSEMBLE DE SES CARACTERISTIQUES 
    &gt;
    </pre> -->
<?php

$sql = "SELECT * FROM Pokemon ORDER BY IdPokemon ASC";
$result = mysqli_query($databaseConnection, $sql);

echo "<table style='width: 100%; border-spacing: 10px;'>"; // Table avec un espacement entre les cellules

$count = 0; // Compteur pour gérer les colonnes

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        
        if ($count % 4 == 0 && $count > 0) { 
            echo "</tr><tr>";  // On créé une ligne tout les 4 pokémons
        }
        echo "<td style='width: 25%; text-align: center;'>";
        echo "<img src='" . $row["urlPhoto"] . "' alt='" . $row["nomPokemon"] . "' />";
        echo "<p>" . $row["nomPokemon"] . "</p>";
        echo "<p> ID : " . $row["idPokemon"] . "</p>";
        echo "</td>"; // On balance UN SEUL pokémon avec noms images et id

        $count++; // On rajoute un au compteur et comme ça quand on arrive à 4 beh ça revient à la ligne enft
    }
    echo "</tr>"; 
    echo "</table>";
}
?>
<?php
require_once("footer.php");
?>