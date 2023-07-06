<?php ob_start(); ?>
<form method="POST" action="<?= URL ?>users/ajoutValidation" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label mt-4" for="username">Username</label>
        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
    </div>
    <div class="form-group">
        <label class="col-form-label mt-4" for="password">Password</label>
        <input type="text" class="form-control" placeholder="Password" id="password" name="password">
    </div>
    <div class="form-group">
        <label class="col-form-label mt-4" for="role">Rôle</label>
        <input type="text" class="form-control" placeholder="Role" id="role" name="role">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php $content = ob_get_clean();
$titre = "Créer un users";
require "template.php"; ?>