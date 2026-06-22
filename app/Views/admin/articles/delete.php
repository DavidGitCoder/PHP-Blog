<?php

use \Core\HTML\BootstrapForm;

$article_id = $_POST['id'];
$articleTable = $app->getTable('Article');
$article = $articleTable->find($article_id);

if (!empty($_POST)) {
    $result = $articleTable->delete($article_id);
    if ($result) {
        header('Location: admin.php');
    }
}

?>
<h2>Edit Article: <span><em><?= $article[0]->title ?></em></span></h2>