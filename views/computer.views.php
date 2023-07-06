<?php ob_start(); ?>
<form method="POST" action="<?= URL ?>computers/modifier/<?= $id ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label mt-4" for="computername">Computername</label>
        <input type="text" class="form-control" value="<?= $users->getComputername() ?>" placeholder="Computername" id="computername" name="computername">
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php $content = ob_get_clean();
$titre = $users->getComputername();
require "template.php"; ?>