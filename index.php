<?php
include './DB/DB.php';
$db = DB::getInstance();
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
$db = DB::getInstance();


$search = $db->prepare("
                                SELECT 'Article.id', 'Article.title', 'Article.content', 'Categorie.name'
                                FROM article
                                INNER JOIN categorie on 'article.category_fk'= 'categorie.id'
");

$state = $search->execute();

if ($state) {
    foreach ($search->fetchAll() as $item) {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
}

    /**
     * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
     */

// TODO Votre code ici.
$db = DB::getInstance();

$search = $db->prepare("
                                SELECT 'ar.id as i', 'ar.title as t', 'ar.content as c', 'ca.name as category'
                                FROM article as ar
                                INNER JOIN categorie as ca on 'ar.category_fk' = 'ca.id'
");

$state = $search->execute();

if ($state) {
    foreach ($search->fetchAll() as $item) {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
}

    /**
     * 5. Ajoutez un utilisateur dans la table utilisateur.
     *    Ajoutez des commentaires et liez un utilisateur au commentaire.
     *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
     */

// TODO Votre code ici.
$db = DB::getInstance();
$search = $db->prepare("
                                SELECT 'co.content', 'ut.firstname', 'ut.lastname'
                                FROM commentaire as co
                                LEFT JOIN utilisateur as ut on 'co.user_fk' = 'ut.id'
");

$state = $search->execute();

if ($state) {
    foreach ($search->fetchAll() as $item) {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
}
$search = $db->prepare("
                                SELECT 'co.content', 'ut.firstname', 'ut.lastname'
                                FROM commentaire as co
                                LEFT JOIN utilisateur as ut on 'co.user_fk' = 'ut.id'
");

