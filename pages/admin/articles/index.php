<?php
$posts = $app->getTable('Article')->allWithCategory();
?>
<h1>
    ADMININISTRER LES ARTICLES
</h1>
<div class="button">
    <a href="admin.php?p=article.add">
        <button type="button" class="btn btn-success my-2">ADD</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th>ACTIONS</th>
        <th>ID</th>
        <th>DATE</th>
        <th>TITLE</th>
        <th>EXCERPT</th>
        <th>CATEGORY</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td>
                <a href="?p=article.edit&id=<?= $post->id ?>" class="btn">🖊️</a>
                <a href="?p=article.edit&id=<?= $post->id ?>" class="btn">🗑️</a>
            </td>
            <td><a href="<?= $post->url ?>"><?= $post->id ?></a>
            </td>
            <td><?= $post->date ?></td>
            <td>
                <a href="<?= $post->url ?>"><?= $post->title ?></a>
            </td>
            <td><?= $post->extrait ?></td>
            <td><a href="<?= $post->categoryUrl ?>"><?= $post->category_title ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

