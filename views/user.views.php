<?php ob_start(); ?>
<form method="POST" action="<?= URL ?>users/modifier/<?= $id ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label mt-4" for="username">Username</label>
        <input type="text" class="form-control" value="<?= $users->getUsername() ?>" placeholder="Username" id="username" name="username">
    </div>
    <div class="form-group">
        <label class="col-form-label mt-4" for="password">Password</label>
        <input type="text" class="form-control" value="<?= $users->getPassword() ?>" placeholder="Password" id="password" name="password">
    </div>
    <div class="form-group">
        <label class="col-form-label mt-4" for="role">Rôle</label>
        <input type="text" class="form-control" value="<?= $users->getRole() ?>" placeholder="Role" id="role" name="role">
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php $content = ob_get_clean();
$titre = $users->getUsername();
require "template.php"; ?>