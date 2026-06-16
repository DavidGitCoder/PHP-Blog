<?php

use \Core\HTML\BootstrapForm;

$article_id = $_GET['id'];
$articleTable = $app->getTable('Article');

$article = $articleTable->find($article_id);
$categories = $app->getTable('Category')->all();
if (!empty($_POST)) {
    $result = $articleTable->update($article_id, [
            "title" => $_POST ['title'],
            "content" => $_POST ['content'],
            "category_id" => $_POST['category']
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
$data = !empty($_POST) ? $_POST : $article[0];


$form = new BootstrapForm($data);

?>
<h2>Edit Article: <span><em><?= $article[0]->title ?></em></span></h2>
<form method="post">
    <?= $form->input('title', 'Title') ?>
    <?= $form->input('content', 'Content', ['type' => 'textarea']) ?>
    <?= $form->dropdown('category', $categories, 'Categories') ?>
    <?= $form->submit("Save") ?>

</form>