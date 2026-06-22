<?php
$categories = $app->getTable('Category')->all();
$type = $_GET['p'] === 'categories.admin' ?
                                        ["type"=>"articles", "title"=>"Articles"]
                                        : ["type"=>"categories", "title"=>"Catégories"];
?>
<p>Gérer les <a href="?p=<?=$type["type"]?>.admin"><?=$type["title"]?></a></p>
<h1>
    ADMININISTRER LES CATEGORIES
</h1>

<div class="button">
    <a href="?p=category.add">
        <button type="button" class="btn btn-success my-2">ADD</button>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th>ACTIONS</th>
        <th>ID</th>
        <th>TITLE</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $cat): ?>
        <tr>
            <td>
                <a href="?p=category.edit&id=<?= $cat->id ?>" class="btn">🖊️</a>
                <form action="?p=category.delete" method="post">
                    <input type="hidden" name="id" value="<?= $cat->id ?>">
                    <button type="submit"
                            class="btn btn-outline-danger"
                            href="?p=category.delete&id=<?= $cat->id ?>">🗑️</button>
                </form>
            </td>
            <td><a href="<?= $cat->url ?>"><?= $cat->id ?></a>
            </td>
            <td>
                <a href="<?= $cat->url ?>"><?= $cat->title ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>