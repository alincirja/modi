<div class="mb-3">
    <a class="btn btn-primary" href="<?php echo ROOT_URL . "admin?page=articles&sec=new"; ?>">Articol Nou</a>
</div>

<?php
    include_once "classes/Article.php";
    $articleObj = new Article();
    $articles = $articleObj->getData("article");

    if (count($articles)) { ?>
    <div id="feedback"></div>
    <table class="table table-striped article-listing-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Descriere</th>
                <th>Data Start</th>
                <th>Data Final</th>
                <th>Pret</th>
                <th>U.M.</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?php echo $article["id"]; ?></td>
            <td><?php echo $article["name"]; ?></td>
            <td><?php echo $article["description"]; ?></td>
            <td><?php echo $article["date_start"]; ?></td>
            <td><?php echo $article["date_end"]; ?></td>
            <td><?php echo $article["price"]; ?></td>
            <td><?php echo $article["measure"]; ?></td>
            <td>
                <a class="btn btn-sm btn-warning" href="<?php echo ROOT_URL; ?>admin?page=articles&sec=gallery&id=<?php echo $article["id"]; ?>"><i class="fas fa-fw fa-image"></i></a>
                <a class="btn btn-sm btn-danger deleteArticle" href="<?php echo ROOT_URL; ?>scripts/admin/article/delete" data-id="<?php echo $article["id"]; ?>"><i class="fas fa-fw fa-times"></i></a>
            </td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
<?php

    }
?>