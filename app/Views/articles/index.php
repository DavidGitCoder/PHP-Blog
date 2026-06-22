<h1>Your Articles</h1>
<p class="lead">Here is a list of all your article and categories</p>
<?php

?>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($posts as $post): ?>

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

        <?php endforeach; ?>


    </div>
    <div class="col-sm-4">
        <p><?php
            foreach ($categories as $category):
            ?>
        <ul>
            <li>
                <a href="<?= $category->url ?>">
                    <?= $category->title ?>
                </a>
            </li>
        </ul>
        <?php endforeach; ?>
        </p>
    </div>
</div>