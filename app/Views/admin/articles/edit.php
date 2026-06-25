<?php if($error_add):?>
    <div class="alert alert-danger">An error occured creating the article</div>
<?php elseif(!empty($_POST)):?>
    <div class="alert alert-success">Successfully created</div>
<?php endif; ?>
<?php if($error_edit):?>
    <div class="alert alert-danger">An error occured updating the article</div>
<?php elseif(!empty($_POST)):?>
    <div class="alert alert-success">Successfully updated</div>
<?php endif; ?>
<h2>Edit Article: <span><em><?= $article[0]->title ?></em></span></h2>
<form method="post">
    <?= $form->input('title', 'Title') ?>
    <?= $form->input('content', 'Content', ['type' => 'textarea']) ?>
    <?= $form->dropdown('category', $categories, 'Categories') ?>
    <?= $form->submit("Save") ?>

</form>