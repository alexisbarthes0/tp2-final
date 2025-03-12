<!-- 
    Ce fichier représente la page de liste par type de pokémon du site.
-->
<?php
require_once("database-connection.php")
?>
<?php
require_once("head.php");
?>
<?php
    $sql = "SELECT 
    p.nomPokemon,
    t1.nomType AS Type1,
    t2.nomType AS Type2,
    p.urlPhoto,
    p.idPokemon
FROM 
    pokemon p
JOIN 
    type_pokemon t1 ON p.idType1 = t1.idType
LEFT JOIN 
    type_pokemon t2 ON p.idType2 = t2.idType
ORDER BY p.idType1, p.idType2;";
$result = mysqli_query($databaseConnection, $sql);

echo "<table style='width: 100%; border-spacing: 10px;'>"; // Une table toute simple

$count = 0; // Compteur pour gérer les colonnes

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        
        if ($count % 4 == 0 && $count > 0) { 
            echo "</tr><tr>";  // On créé une ligne tout les 4 pokémons
        }
        echo "<td style='width: 25%; text-align: center;'>"; //Chaque pkmn prends 1/4 de la ligne et le texte est aligné
        echo "<a href='fichepokemon.php?id=" . $row["idPokemon"] . "'>"; //pour aller à la page pokemon (on met une balise <a> pour englober juste l'image et quand on clique dessu sle href nous emmene à la page)
        echo "<img src='" . $row["urlPhoto"] . "' alt='" . $row["nomPokemon"] . "' />"; //Affichage de la photo
        echo "</a>";
        echo "<p>" . $row["nomPokemon"] . "</p>"; //Affichage du nom
        echo "<p>" . $row["Type1"] . "</p>"; //Affichage du premier type
        if (!empty($row['Type2'])) {
            echo "<p>" . $row['Type2'] . "</p>";
        } else {
            echo "<p> &nbsp; </p>"; 
        }
        // echo "<p>" . $row["nomType2"] . "</p>"; //Affichage du second type de ses mort jpp
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