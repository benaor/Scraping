<h1><?= $params['scrap']->title ?? 'créer un nouveau scrap' ?> </h1>

<form action="<?= isset($params['scrap']) ? "/projet-CDA/scrap/public/admin/scraping/edit/{$params['scrap']->getId()}" : "/projet-CDA/scrap/public/admin/scraping/new" ?>" class="form-group col-6 m-auto" method="POST">

    <div class="my-2">
        <label for="title">Titre du scraping</label>
        <input type="text" name="title" class="form-control" value="<?= $params['scrap']->title ?? ''?>">
    </div>

    <div class="my-2">
        <label for="title">URL du scraping</label>
        <input type="text" name="url" class="form-control" value="<?= $params['scrap']->url ?? ''?>">
    </div>

    <div class="my-2">
        <label for="title">Path du scraping</label>
        <input type="text" name="path" class="form-control" value="<?= $params['scrap']->path ?? ''?>">
    </div>

    <div class="form-group my-2">
        <label for="categories">Categories de l'article</label>
        <select multiple class="form-control" id="category" name="category[]">

            <?php foreach ($params['categories'] as $category) { ?>

                <option value="<?= $category->getId() ?>" 
                    <?php if(isset($params['scrap'] )): ?> 
                        
                        <?php foreach ($params['scrap']->getCategory() as $scrapCategory) { echo ($category->getId() === $scrapCategory->getId()) ? 'selected' : '';} ?>

                    <?php endif ?>
                    >
                    <?= $category->getName() ?> 
                </option>

            <?php } ?>

        </select>
    </div>

    <input type="submit" value="<?= isset($params['scrap']) ? 'Enregistrer les modifications' : 'Créer un scrap' ?>" class="btn btn-success my-3 w-100">
</form>