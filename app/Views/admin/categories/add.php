<?php

use \Core\HTML\BootstrapForm;

$categoryTable = $app->getTable('Category');

if (!empty($_POST)) {
    $result = $categoryTable->create([
        "title" => $_POST ['title']
    ]);

    if ($result) {
        header('Location: ?p=category.edit&id='.$app->getDb()->lastInsertId());
        ?>
        <div class="alert alert-success">Sucessfully Created!</div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning">Creation Failed</div>
        <?php
    }
}
$form = new BootstrapForm($_POST);

?>
<h2>Add a Category</h2>
<form method="post">
    <?= $form->input('title', 'Title') ?>
    <?= $form->submit("Create") ?>
</form>