<?php ob_start();
?>
<table class="table table-hover text-center align-middle">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Computer-name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($computer) || $computer instanceof Countable) {
            if (count($computer) > 0) {
                for ($i = 0; $i < count($computer); $i++) { ?>
                    <tr class="table-dark">
                        <th scope="row"><?= $computer[$i]->getId() ?></th>
                        <td><?= $computer[$i]->getComputername() ?></td>
                        <td><?= $computer[$i]->getComputerStatus() ?></td>
                        <td>
                            <a href="<?= URL . "computers/voir/" . $computer[$i]->getId() ?>" class="btn btn-warning">Modifier</a>
                            <a href="<?= URL . "computers/supprimer/" . $computer[$i]->getId() ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4">Aucune donnée d'ordinateurs disponible.</td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="4">Erreur : Les données d'ordinateurs sont invalides.</td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<a href="<?= URL . "computers/ajouter/" ?>" class="btn btn-success">Ajouter</a>

<?php $content = ob_get_clean();
$titre = "Page Computers";
require "template.php"; ?>