<h1> Se connecter </h1>

<form action="/projet-CDA/scrap/public/login" class="form-group col-6 m-auto" method="POST">

    <div class="my-2">
        <label for="username">Adresse email</label>
        <input type="email" name="username" class="form-control" id="username" value="benjamingirard25@gmail.com">
    </div>

    <div class="my-2">
        <label for="password"></label>
        <input type="password" name="password" class="form-control" id="password" value="password">
    </div>

    <input type="submit" value="Connexion" class="btn btn-success my-3 w-100">

    <?php if(!empty($_GET['error'])) echo '<p class="alert alert-danger text-center"> Identifiant incorrect </p>'; ?>
</form>