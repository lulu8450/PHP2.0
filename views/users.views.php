<?php ob_start();
?>
<table class="table table-hover text-center align-middle">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Rôle</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($user) || $user instanceof Countable) {
            if (count($user) > 0) {
                for ($i = 0; $i < count($user); $i++) { ?>
                    <tr class="table-dark">
                        <th scope="row"><?= $user[$i]->getId() ?></th>
                        <td><?= $user[$i]->getUsername() ?></td>
                        <td><?= $user[$i]->getPassword() ?></td>
                        <td><?= $user[$i]->getRole() ?></td>
                        <td>
                            <a href="<?= URL . "users/voir/" . $user[$i]->getId() ?>" class="btn btn-warning">Modifier</a>
                            <a href="<?= URL . "users/supprimer/" . $user[$i]->getId() ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4">Aucune donnée d'utilisateurs disponible.</td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="4">Erreur : Les données d'utilisateurs sont invalides.</td>
            </tr>
        <?php } ?>

    </tbody>
</table>
<a href="<?= URL . "users/ajouter/" ?>" class="btn btn-success">Ajouter</a>

<?php $content = ob_get_clean();
$titre = "Page Users";
require "template.php"; ?>