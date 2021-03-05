<?php

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */

// TODO Votre code ici.
$server = 'localhost';
$user = 'root';
$password = 'dev';
$bdd = 'blog';

try {
    $connect =new PDO("mysql:host=$server;dbname=$bdd;charset=utf8", $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $sql = $connect->prepare("SELECT Article.title, Article.content, 'Categorie.name'
                                FROM Article
                                    INNER JOIN Categorie C on Article.category_fk = C.id
                            ");

    $sql->execute();
    echo"<pre>";
    print_r($sql->fetchAll());
    echo"</prev";

    /**
     * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
     */

// TODO Votre code ici.
    $sql = $connect->prepare("SELECT ar.title, ar.content, C.name
                                FROM Article AS ar 
                                INNER JOIN Categorie C on ar.category_fk = C.id");


    /**
    * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.
$sql = $connect->prepare("INSERT INTO Utilisateur(firstName, lastName, mail, password) 
                                VALUES('bulle', 'bubulle','bulle@gmail.com','azerty')");

$sql = $connect->prepare("INSERT INTO Commentaire(content, user_fk, article_fk) 
                                VALUES ('un joli texte sql', '3', '2')");

$sqlRequest = $connect->prepare("SELECT Article.title, 'Auteur.fristName', 'Auteur.lastName', 'Categorie.name'
                                       FROM Article
                                           LEFT JOIN Auteur A on A.id = Article.author_fk
                                           LEFT JOIN Categorie C on C.id = Article.category_fk
                                 ");

}
catch(PDOException $exeption) {
    echo 'error'. $exeption->getMessage();
}

