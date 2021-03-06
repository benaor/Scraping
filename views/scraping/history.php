<h1>historique des scraps</h1>


<?php foreach ($params['scraps'] as $scrap) { ?>

    <div class="card mb-3">
        <h2><?= $scrap->getTitle() ?></h2>

        <?php foreach ($scrap->getCategory() as $category) { ?>
            <span class="badge badge-info col-1">
                <a href="/projet-CDA/scrap/public/category/<?= $category->getId() ?>" class="text-white">
                    <?= $category->name; ?>
                </a>
            </span>
        <?php } ?>

        <p><?= $scrap->getUrl() ?></p>
        <p><?= $scrap->getPath() ?></p>
        <p><?= $scrap->getCreatedAt() ?></p>
        <a href="scrap/<?= $scrap->getId() ?>" class="btn btn-success">Voir le details</a>

    </div>

<?php } ?>