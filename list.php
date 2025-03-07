
<?php
require_once("database-connection.php")
?>
<?php
require_once("head.php");
?>
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
       
        //Ce lien pour aller vers la page détaillé je la hais du plus profond de mon âme
        echo "<a href='fichepokemon.php?id=" . $row["idPokemon"] . "'>";
        echo "<img src='" . $row["urlPhoto"] . "' alt='" . $row["nomPokemon"] . "' />";
        echo "</a>";

        // Affichage du nom et de l'ID (les informations peuvent être adaptées selon vos besoins)
        echo "<p>" . $row["nomPokemon"] . "</p>";
        echo "<p> ID : " . $row["idPokemon"] . "</p>";

        $count++; // On rajoute un au compteur et comme ça quand on arrive à 4 beh ça revient à la ligne enft
    }
    echo "</tr>"; 
    echo "</table>";
}
?>
<?php
require_once("footer.php");
?>