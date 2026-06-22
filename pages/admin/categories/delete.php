<?php

use \Core\HTML\BootstrapForm;

$category_id = $_POST['id'];
$categoryTable = $app->getTable('Category');
$category = $categoryTable->find($category_id);

if (!empty($_POST)) {
    $result = $categoryTable->delete($category_id);
    if ($result) {
        header('Location: admin.php?p=category.admin');
    }
}

?>
<h2>Edit Article: <span><em><?= $category[0]->title ?></em></span></h2>