<!-- 
    Ce fichier représente la page de liste par type de pokémon du site.
-->
<?php
require_once("database-connection.php")
?>
<?php
require_once("head.php");
?>
<!-- <pre>
    &lt;
    A REMPLACER PAR VOTRE CODE POUR CHARGER ET AFFICHER DANS UN TABLEAU LA LISTE DES POKEMONS CLASSES PAR LEUR TYPE, PUIS PAR LEUR NOM.
    CHAQUE POKEMON DOIT ETRE CLIQUABLE POUR NAVIGUER SUR UNE PAGE OU L'ON AFFICHE SON IMAGE ET L'ENSEMBLE DE SES CARACTERISTIQUES
    &gt;
    </pre> -->

<?php
    $sql = "SELECT *
            FROM pokemon
            JOIN type_pokemon ON pokemon.idType1 = type_pokemon.idType
            -- LEFT JOIN type_pokemon ON pokemon.idType2 = type_pokemon.idType 
            ORDER BY pokemon.idType1 ASC";
$result = mysqli_query($databaseConnection, $sql);

echo "<table style='width: 100%; border-spacing: 10px;'>"; // Une table toute simple

$count = 0; // Compteur pour gérer les colonnes

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        
        if ($count % 4 == 0 && $count > 0) { 
            echo "</tr><tr>";  // On créé une ligne tout les 4 pokémons
        }
        echo "<td style='width: 25%; text-align: center;'>"; //Chaque pkmn prends 1/4 de la ligne et le texte est aligné
        echo "<img src='" . $row["urlPhoto"] . "' alt='" . $row["nomPokemon"] . "' />"; //Affichage de la photo
        echo "<p>" . $row["nomPokemon"] . "</p>"; //Affichage du nom
        echo "<p>" . $row["nomType"] . "</p>"; //Affichage du premier type
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