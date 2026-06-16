<?php
$posts=$app->getTable('Article')->allWithCategory();
?>
<h1>
    ADMININISTRER LES ARTICLES
</h1>
<?php foreach ($posts as $post): ?>
<div class="flex-column justify-content-between align-items-start">
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between align-items-start"><a
                    href="<?= $post->url ?>">
                <span class="badge text-bg-primary rounded-pill"><?= $post->id ?></span>
                <a href="<?= $post->categoryUrl ?>">
                    <span class="badge text-bg-primary rounded-pill"><?= $post->category_title ?></span>
                </a>
            </a>
            <span><?= $post->date ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
            <a href="<?= $post->url ?>">
                <h2><?= $post->title ?></h2>
            </a>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?= $post->extrait ?>
        </li>
    </ul>
</div>
<?php endforeach; ?>
