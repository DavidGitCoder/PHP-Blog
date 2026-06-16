<?php
use \Core\HTML\BootstrapForm;
$form=new BootstrapForm($_POST);
$article=$app->getTable('Article')->find($_GET['id']);
$categories=$app->getTable('Category')->all();
?>
<h2>Edit Article: <span><em><?=$article[0]->title?></em></span></h2>
<form action="" method="post">
    <?=$form->input('title','Title')?>
    <?=$form->input('content','Content',['type'=>'textarea'])?>
    <?=$form->dropdown('category',$categories,'Categories')?>
    <?=$form->submit("Save")?>

</form>