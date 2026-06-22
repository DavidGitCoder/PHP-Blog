<?php
use \Core\HTML\BootstrapForm;

$category_id = $_GET['id'];
$categoryTable = $app->getTable('Category');
$category=$categoryTable->find($category_id);

if (!empty($_POST)) {
    $result = $categoryTable->update($category_id, [
            "title" => $_POST ['title']
    ]);
    if ($result) {
        ?>
        <div class="alert alert-success">Sucessfully Updated!</div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning">Updated Failed</div>
        <?php
    }
}
$data = !empty($_POST) ? $_POST : $category[0];

$form = new BootstrapForm($data);

?>
<h2>Edit Category: <span><em><?= $category[0]->title ?></em></span></h2>
<form method="post">
    <?= $form->input('title', 'Title') ?>
    <?= $form->submit("Save") ?>
</form>