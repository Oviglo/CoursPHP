<?php 
$title = "Croisière";
if (!isset($_GET['id'])) {
    addFlashMessage('error', "La croisière n'existe pas");

    header("Location: index.php");
}

$cruise = getCruise($_GET['id']);

ob_start();
?>
<h1>Croisère - <?=$cruise['name'];?></h1>
<article>
    <header class="text-center">
        <img src="<?=$cruise['photo'];?>" alt="<?=$cruise['name'];?>" class="img-fluid"/>
    </header>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>