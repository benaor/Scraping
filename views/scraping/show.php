<h1>Scrap numero <?= $params['scrap']->getId() ?> </h1>

<p>titre : <?= $params['scrap']->getTitle() ?></p>
<p>titre : <?= $params['scrap']->getUrl() ?></p>
<p>titre : <?= $params['scrap']->getPath() ?></p>


<?php foreach($params['scrap']->getCategory() as $category){ ?>
        <span class="badge badge-info col-1">
            <?= $category->name; ?>
        </span>
    <?php } ?> 

<!-- 
<pre>
<?php print_r($params) ?>
</pre> --> 