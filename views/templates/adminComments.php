<h2>Gestion des commentaires</h2>

<table class="adminArticle">
    <thead>
        <tr>
            <th>Pseudo</th>
            <th>Commentaire</th>
            <th>Article</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($comments as $comment) { ?>
            <tr>
                <td>
                    <?= Utils::format($comment['pseudo']) ?>
                </td>
                <td>
                    <?= Utils::format(mb_substr($comment['content'], 0, 120)) ?>
                </td>
                <td>
                    <?= Utils::format($comment['title']) ?>
                </td>
                <td>
                    <?= Utils::convertDateToFrenchFormat(new DateTime($comment['date_creation'])) ?>
                </td>
                <td>
                    <a class="submit" href="index.php?action=deleteComment&id=<?= $comment['id'] ?>"
                        <?= Utils::askConfirmation("Supprimer ce commentaire")  ?>>
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>