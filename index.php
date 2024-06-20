<?php
require_once '_connec.php';
$firstNameErr = $lastNameErr = "";
$firstname = $lastname = "";
$errors = [];
//On essaie de se connecter
try{
    $pdo = new PDO("mysql:host=$servername;dbname=pdo_quest", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<p style="color:#007bff">🚦Connexion réussie:  Bienvenue sur la page d\'accueil !</p>';
   
}

/*On capture les exceptions si une exception est lancée et on affiche
 *les informations relatives à celle-ci*/
catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['firstname'])) {
        $firstNameErr = "Le prénom est obligatoire";
        $errors[] = $firstNameErr;
    } elseif (strlen($_POST['firstname']) < 2 || strlen($_POST['firstname']) > 45) {
        $firstNameErr = "Le prénom doit contenir au moins 2 caractères et moins de 45 caractères";
        $errors[] = $firstNameErr;
    } else {
        $firstname = trim($_POST['firstname']);
    }

    if (empty($_POST['lastname'])) {
        $lastNameErr = "Le nom est obligatoire";
        $errors[] = $lastNameErr;
    } elseif (strlen($_POST['lastname']) < 2 || strlen($_POST['lastname']) > 45) {
        $lastNameErr = "Le nom doit contenir au moins 2 caractères et moins de 45 caractères";
        $errors[] = $lastNameErr;
    } else {
        $lastname = trim($_POST['lastname']);
    }

    if (empty($errors)) {
        // On prépare notre requête d'insertion
        $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = $pdo->prepare($query);
        // On lie les valeurs saisies dans le formulaire à nos placeholders
        $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $statement->execute();
           // Rediriger vers la même page en utilisant GET pour éviter la "re-soumission" du formulaire
        header('Location: index.php');
        exit;
    }
}
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();
// $query = "SELECT * FROM friend";
// $statement = $pdo->query($query);
// $result = $statement->fetch(PDO::FETCH_ASSOC);
// print_r($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Friends</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Liste d'amis</h1>
        <?php
        // On affiche chaque ami
        echo '<ul>';
        foreach ($friends as $friend) {
            echo '<li>'.'😄' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>';
        }
        echo '</ul>';
        ?>
        <h2>Ajouter un ami</h2>
     
        <form action="index.php" method="post">
            <label for="firstname">Prénom :</label>
            <span class="error">* <?php echo $firstNameErr; ?></span>
            <input type="text" id="firstname" name="firstname">
            <label for="lastname">Nom :</label>
            <span class="error">* <?php echo $lastNameErr; ?></span>
            <input type="text" id="lastname" name="lastname">
            <input type="submit" value="Ajouter un ami">
        </form>
    </body>
</html>
