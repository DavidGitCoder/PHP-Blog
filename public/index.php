<?php
use App\Controller\ArticleController;
use App\Controller\UserController;

define('ROOT',dirname(__DIR__));
require ROOT.'\app\App.php';
App::load();

$page='home';
if(isset($_GET['p'])){
    $page=$_GET['p'];
}

$controller = new ArticleController();

if($page==='home'){
    $controller->index();
}
else if($page==='login'){
    $controller = new UserController();
    $controller->login();
}
else if($page==='article.show'){
    $controller->show();
}
else if($page==='article.category'){
    $controller->categories();
}
else if($page==='404'){
    require ROOT.'\pages\404.php';

}
?>

