<!-- 
    Ce fichier représente la page d'accueil du site.
-->
<?php
require_once("head.php");
?>
<article class="text-center">
    <h2>Bienvenue</h2>
    <p>Bienvenue sur le site du Pokédex du Professeur Chen.</p>
    <p>Ce site web recense les pokémons existants dans la région de Kanto.</p>
    <p>Utilisez le menu latéral pour naviguer entre les différentes pages du site, ou utilisez la barre de recherche pour rechercher les pokémons par leur nom.</p>
</article>
<!-- // Vérifie  connection
if (!$databaseConnection) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<p>" . "Connected successfully" . "</p>" ; -->
<?php
require_once("footer.php");
?>