<?php 
    //Récupération du tri actuel depuis l'URL
    $currentSort = $_GET['sort'] ?? 'date_creation';
    $currentOrder = $_GET['order'] ?? 'DESC';
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
            <th>
                <a href="index.php?action=admin&sort=title&order=<?= ($currentSort === 'title' && $currentOrder === 'ASC') ? 'DESC' : 'ASC' ?>">
                    Titre
                    <?= $currentSort === 'title' ? ($currentOrder === 'ASC' ? '↑' : '↓') : '' ?>
                </a>
            </th>
            <th>
                <a href="index.php?action=admin&sort=views&order=<?= ($currentSort === 'views' && $currentOrder === 'ASC') ? 'DESC' : 'ASC' ?>">
                    Vues
                    <?= $currentSort === 'views' ? ($currentOrder === 'ASC' ? '↑' : '↓') : '' ?>
                </a>
            </th>
            <th>
                 <a href="index.php?action=admin&sort=nb_comments&order=<?= ($currentSort === 'nb_comments' && $currentOrder === 'ASC') ? 'DESC' : 'ASC' ?>">
                    Commentaires
                    <?= $currentSort === 'nb_comments' ? ($currentOrder === 'ASC' ? '↑' : '↓') : '' ?>
                </a>
            </th>
            <th>
                 <a href="index.php?action=admin&sort=date_creation&order=<?= ($currentSort === 'date_creation' && $currentOrder === 'ASC') ? 'DESC' : 'ASC' ?>">
                    Date de publication
                    <?= $currentSort === 'date_creation' ? ($currentOrder === 'ASC' ? '↑' : '↓') : '' ?>
                </a>
            </th>
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

<div class="adminManagement">
    <a class="submit" href="index.php?action=showUpdateArticleForm">
        Ajouter un article
    </a>
    <a class="submit" href="index.php?action=showComments">
        Gérer les commentaires
    </a>
</div>