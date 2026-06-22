<h1>Articles in <?= $cat[0]->title ?></h1>
<div class="row">
    <div class="col-sm-8">
        <?php foreach ($articles as $post): ?>

            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold"><a
                            href="<?= $post->url ?>"><h2><?= $post->title ?></h2></a></li>
                <li class="list-group-item d-flex justify-content-between align-items-center"></a><span><?= $post->date ?></span></li>
            </ul>

        <?php endforeach; ?>


    </div>
    <div class="col-sm-4">
        <p><?php foreach ($categories as $category): ?>
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
