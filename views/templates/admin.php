<?php 
    /** 
     * Affiche un tableau contenant : 
     * le titre, le nb de vues et de commentaires, la date de publication 
     * ansi que les actions (modifier / supprimer)
     * $articles contient des tableaux associatifs car ils proviennent d'une requête SQL avec COUNT().
     */
?>

<h2>Edition des articles</h2>

<table class="adminArticle">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Vues</th>
            <th>Commentaires</th>
            <th>Date de publication</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?=Utils::format($article['title']); ?></td>
                <td><?= (int)$article['views']; ?></td>
                <td><?= (int)$article['nb_comments']; ?></td>
                <!--Date de publication est convertie en DateTime pour utiliser Utils-->
                <td><?= $article['date_creation'] ? Utils::convertDateToFrenchFormat(new DateTime($article['date_creation'])) : "—"; ?></td>
                <td>
                <a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article['id'] ?>">Modifier</a>
                <a class="submit" href="index.php?action=deleteArticle&id=<?= $article['id'] ?>" 
                <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>