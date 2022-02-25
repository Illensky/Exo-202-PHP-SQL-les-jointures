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

require __DIR__ . "/Classes/DBSingleton.php";

$pdo = DBSingleton::PDO();

$stm = $pdo->prepare("
    SELECT article.id, article.title, article.content, categorie.name
    FROM article
    INNER JOIN categorie ON article.category_fk = categorie.id
");

if ($stm->execute()) {
    foreach ($stm->fetchAll() as $article) {
        foreach ($article as $detail) {
            echo $detail."<br>";
        }
        echo "<br>";
    };
}


/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.

$stm = $pdo->prepare("
    SELECT ar.id AS i, ar.title AS t, ar.content AS c, ca.name AS cn
    FROM article AS ar
    INNER JOIN categorie AS ca ON ar.category_fk = ca.id
");

if ($stm->execute()) {
    foreach ($stm->fetchAll() as $article) {
        foreach ($article as $key => $detail) {
            echo $key." => ".$detail."<br>";
        }
        echo "<br>";
    };
}

/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.

$stm = $pdo->prepare("
    SELECT commentaire.content, utilisateur.firstName, utilisateur.lastName
    FROM commentaire
    LEFT JOIN utilisateur ON utilisateur.id = commentaire.user_fk
");

if ($stm->execute()) {
    foreach ($stm->fetchAll() as $comment) {
        foreach ($comment as $key => $detail) {
            echo $key." => ".$detail."<br>";
        }
        echo "<br>";
    };
}