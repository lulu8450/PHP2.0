<?php ob_start(); ?>
<form method="POST" action="<?= URL ?>computers/ajoutValidation" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-form-label mt-4" for="computername">Computername</label>
        <input type="text" class="form-control" placeholder="computername" id="computername" name="computername">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<?php $content = ob_get_clean();
$titre = "Créer un computers";
require "template.php"; ?>