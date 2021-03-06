<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> scraping </title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <div class="container">
                <ul class="navbar-nav mr-auto d-flex justify-content-between">
                    <div class="row">
                        <li class="nav-item text-uppercase font-weight-bold">
                            <a class="nav-link" href="/projet-CDA/scrap/public/home">Accueil</a>
                        </li>
                        <?php if ($_SESSION) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-bold" href="/projet-CDA/scrap/public/scrap">Scraping</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/projet-CDA/scrap/public/history">Historique</a>
                        </li>
                        <?php endif; ?>
                    </div>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <?php if ($_SESSION) : ?>
                            <a class="nav-link btn btn-outline-light" href="/projet-CDA/scrap/public/logout">Logout</a>
                        <?php else : ?>
                            <a class="nav-link btn btn-outline-light" href="/projet-CDA/scrap/public/login">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <?= $content ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>