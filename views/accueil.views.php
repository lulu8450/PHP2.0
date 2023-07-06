<?php ob_start() ?>
Je suis sur la page d'accueil
<?php $content = ob_get_clean();
$titre = "Page Accueil";
require "template.php"; ?>