<?php

require_once './utils/functions.php';

require_once './database/db.php';

$metadata = [
    'title' => 'Wanted - Gestion des catégories',
    'description' => 'Ajouter, modifier, supprimer vos catégories',
];

getPartial('header', $metadata);
?>
<h1>Gestion des catégories</h1>

<?php
    // debug($_POST);
    if (!empty($_POST)) {
        if (isset($_POST['submit']) && !empty($_POST['title'])) {
            // on extrait les clés du tableau associatif sous forme de variables
            extract($_POST);

            // avec trim on supprime les espaces avant et après l'input
            // avec htmlspecialchars on convertit certains caractères spéciaux en entités HTML
            $title = htmlspecialchars(trim($title));

            // construction de la requête
            $query = 'INSERT INTO category (title) VALUES(:title);';

            // tableau associatif contenant les marqueurs / values
            $data = ['title' => $title];

            // exécution de la requête
            $lastInsertedId = prepareAndExecute($query, $data, true);

            debug($lastInsertedId);
        }
    }

    // test d'une requête en SELECT
    $results = prepareAndExecute('SELECT * FROM category')->fetchAll();

debug($results);

?>

<div class="container">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="categoryTitle" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" name="title" id="categoryTitle" aria-describedby="categoryHelp">
            <div id="categoryHelp" class="form-text">Entrez le nom de la catégorie à ajouter</div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
    </form>
</div>

<?php
getPartial('footer');

?>