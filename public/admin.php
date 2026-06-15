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
    require ROOT.'\pages\admin\articles\index.php';
}
else if($page==='article.show'){
    require ROOT.'\pages\admin\articles\show.php';
}
else if($page==='article.category'){
    require ROOT.'\pages\admin\articles\category.php';
}
else if($page==='404'){
    require ROOT.'\pages\404.php';

}
$content=ob_get_clean();

require ROOT.'\pages\templates\default.php';


?>