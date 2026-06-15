<?php

$post =App::getInstance()->getTable('Article')->singleWithCategory($_GET['id']);
if (!$post) App::notFound();
App::getInstance()->title=$post[0]->title;
?>
<div class="flex-column justify-content-between align-items-start p-5">
    <h2>
        <?= $post[0]->title ?>
    </h2>
    <a href="<?= $post[0]->categoryUrl ?>">
        <span class="badge text-bg-primary rounded-pill my-2"><?= $post[0]->category_title ?></span>
    </a>
    <p class="lead"><?= $post[0]->content ?></p>
</div>


