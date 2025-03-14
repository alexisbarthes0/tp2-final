
<?php
require_once("database-connection.php")
?>
<?php
require_once("head.php");
?>
<?php
//J'ai tenté de flex en mettant un petit message si connecté dans le head, mais j'ai pas réussi. J'ai du mal avec les variables globales :/


// $connecte = 0;
//Là on dit si y a inscription les variables prennent comme valeur les inputs 
if (isset($_POST['inscription'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $login = $_POST['login'];
    $password = $_POST['password'];
//La sécurité tout ça, c'est important
    $passwordSecurite = password_hash($password, PASSWORD_BCRYPT);

    //maintenant on insert dans la base de donnée
    $sql = "INSERT INTO users (prenom, nom, login, password) VALUES (?, ?, ?, ?)";
    $entree = $databaseConnection->prepare($sql);
    $entree->bind_param("ssss", $prenom, $nom, $login, $passwordSecurite);

    if ($entree->execute()) {
        echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur : " . $entree->error;
    }
}

// Si y a connection
if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    //Vérification du login
    $sql = "SELECT * FROM users WHERE login = ?";
    $entree = $databaseConnection->prepare($sql);
    $entree->bind_param("s", $login);
    $entree->execute();
    $result = $entree->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // verification du mdp
        if (password_verify($password, $row['password'])) {
            echo "Bienvenue à Kanto, " . $row['prenom'] . " " . $row['nom'];
            // $connecte = 1;
        } else {
            echo "Mot de passe incorrect, veuillez réessayer.";
        }
    } else {
        echo "Login non trouvé.";
    }
}

?>

<h2>Inscription</h2>

<form method="POST">
<label for="prenom">Prénom:</label><br>
<input type="text" id="prenom" name="prenom" required><br><br>

<label for="nom">Nom:</label><br>
<input type="text" id="nom" name="nom" required><br><br>

<label for="login">Login:</label><br>
<input type="text" id="login" name="login" required><br><br>

<label for="password">Mot de passe:</label><br>
<input type="password" id="password" name="password" required><br><br>

<input type="submit" name="inscription" value="S'inscrire">
</form>

<h2>Connexion</h2>
<form method="POST">
<label for="login">Login:</label><br>
<input type="text" id="login" name="login" required><br><br>

<label for="password">Mot de passe:</label><br>
<input type="password" id="password" name="password" required><br><br>

<input type="submit" name="connexion" value="Se connecter">
<?php
 ?>
 <?php
require_once("footer.php");
?>