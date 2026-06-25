
<p>Gérer les <a href="?p=admin.<?=$type["type"]?>.index"><?=$type["title"]?></a></p>
<h1>
    ADMININISTRER LES ARTICLES
</h1>

<div class="button">
    <a href="?p=admin.article.add">
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
                <a href="?p=admin.article.edit&id=<?= $post->id ?>" class="btn">🖊️</a>
                <form action="?p=admin.article.delete" method="post">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button type="submit"
                            class="btn btn-outline-danger"
                            href="?p=admin.article.delete&id=<?= $post->id ?>">🗑️</button>
                </form>
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