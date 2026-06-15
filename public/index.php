<?php

define('ROOT',dirname(__DIR__));
require ROOT.'\app\App.php';
App::load();

$page='home';
if(isset($_GET['p'])){
    $page=$_GET['p'];
}

ob_start();
if($page==='home'){
    require ROOT.'\pages\articles\home.php';
}
else if($page==='article'){
    require ROOT.'\pages\articles\single.php';
}
else if($page='article.category'){
    require ROOT.'\pages\articles\category.php';
}
else if($page==='404'){
    require ROOT.'\pages\single.php';

}
$content=ob_get_clean();

require ROOT.'\pages\templates\default.php';


?>