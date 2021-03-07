<h1> S'inscrire</h1>

<?php if (isset($_GET['success'])) : ?>
    <div class="alert alert-success">Vous êtes maintenant inscrit</div>
<?php endif ?>

<form action="/projet-CDA/scrap/public/register" class="form-group col-6 m-auto" method="POST">

    <div class="my-2">
        <label for="firstName">FirstName</label>
        <input type="text" name="firstName" class="form-control" id="firstName">
    </div>

    <div class="my-2">
        <label for="lastName">LastName</label>
        <input type="text" name="lastName" class="form-control" id="lastName">
    </div>

    <div class="my-2">
        <label for="email">email Adress</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>

    <div class="my-2">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>

    <div class="my-2">
        <label for="passwordConfirm">Password Confirm</label>
        <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm">
    </div>

    <input type="submit" value="Inscription" class="btn btn-success my-3 w-100">

    <?php if (!empty($_GET['error'])) echo '<p class="alert alert-danger text-center"> une erreur est survenue </p>'; ?>
</form>