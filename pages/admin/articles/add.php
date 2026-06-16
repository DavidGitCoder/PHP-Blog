<?php

use \Core\HTML\BootstrapForm;

$articleTable = $app->getTable('Article');

$categories = $app->getTable('Category')->all();

if (!empty($_POST)) {
    $result = $articleTable->create([
        "title" => $_POST ['title'],
        "content" => $_POST ['content'],
        "category_id" => $_POST['category']
    ]);
    if ($result) {
        header('Location: admin.php?p=article.edit&id='.$app->getDb()->lastInsertId());
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
<h2>Add an Article</h2>
<form method="post">
    <?= $form->input('title', 'Title') ?>
    <?= $form->input('content', 'Content', ['type' => 'textarea']) ?>
    <?= $form->dropdown('category', $categories, 'Categories') ?>
    <?= $form->submit("Create") ?>

</form>