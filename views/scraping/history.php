<h1>historique des scraps</h1>
 

<?php foreach ($params['scraps'] as $scrap) { ?>

<div class="card mb-3">
    <h2><?= $scrap->title ?></h2>
    <p><?= $scrap->category ?></p>
    <p><?= $scrap->url ?></p>
    <p><?= $scrap->path ?></p>
    <a href="scrap/<?= $scrap->id ?>" class="btn btn-success">Voir le details</a>
</div>

<?php } ?>