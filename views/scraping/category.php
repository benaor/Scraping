<h1> <?= $params['category']->getName() ?> </h1>

<?php foreach ($params['category']->getScraps() as $scrap) { ?>
    <div class="card mb-3">
        <h2><?= $scrap->title ?></h2>
        <a href="/projet-CDA/scrap/public/scrap/<?= $scrap->getId() ?>" class="btn btn-success">Voir le details</a>
    </div>
<?php } ?>