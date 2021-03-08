<div class="jumbotron my-5 p-2 col-6 mx-auto">

    <h1 class="text-center my-3"> Connecte toi ! </h1>

    <form action="/projet-CDA/scrap/public/login" class="form-group col-6 m-auto" method="POST">

        <div class="my-2">
            <label for="username">email Adress</label>
            <input type="email" name="username" class="form-control" id="username" value="benjamingirard25@gmail.com">
        </div>

        <div class="my-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="password">
        </div>

        <input type="submit" value="Connexion" class="btn btn-success my-3 w-100">

        <?php if (!empty($_GET['error'])) echo '<p class="alert alert-danger text-center"> Identifiant incorrect </p>'; ?>
    </form>

    <p class="text-center my-2">Si tu n'es pas encore inscrit, c'est par ici : <br>
        <a href="/projet-CDA/scrap/public/register" class="btn btn-dark my-3"> s'inscrire </a>
    </p>

</div>