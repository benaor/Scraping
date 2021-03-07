<h1>Administration des scraps</h1>

<?php if (isset($_GET['success'])) : ?>
    <div class="alert alert-success">Vous êtes connecté</div>
<?php endif ?>

<a href="/projet-CDA/scrap/public/admin/scraping/new/" class="btn btn-primary my-3">Nouveau scrap</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">titre</th>
            <th scope="col">publié le</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($params['scraps'] as $scrap) { ?>

            <tr>
                <th scope="row"> <?= $scrap->getId() ?> </th>
                <td> <?= $scrap->getTitle() ?> </td>
                <td> <?= $scrap->getCreatedAt() ?> </td>
                <td>
                    <a href="/projet-CDA/scrap/public/admin/scraping/edit/<?= $scrap->getId() ?>" class="btn btn-warning">Modifier</a>
                    <form action="/projet-CDA/scrap/public/admin/scraping/delete/<?= $scrap->getId() ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>

        <?php } ?>

    </tbody>
</table>