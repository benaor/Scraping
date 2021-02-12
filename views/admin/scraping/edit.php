<h1>Formulaire de modification de <?= $params['scrap']->getTitle() ?> </h1>

<form action="/projet-CDA/scrap/public/admin/scraping/edit/<?= $params['scrap']->getId() ?>" class="form-group col-6 m-auto" method="POST">

    <div class="my-2">
        <label for="title">Titre du scraping</label>
        <input type="text" name="title" class="form-control" value="<?= $params['scrap']->getTitle() ?>">
    </div>

    <div class="my-2">
        <label for="title">URL du scraping</label>
        <input type="text" name="url" class="form-control" value="<?= $params['scrap']->getUrl() ?>">
    </div>

    <div class="my-2">
        <label for="title">Path du scraping</label>
        <input type="text" name="path" class="form-control" value="<?= $params['scrap']->getPath() ?>">
    </div>

    <input type="submit" value="Modifier le scrap" class="btn btn-success my-3 w-100">
</form>