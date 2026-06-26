<?php

namespace App\Controller;

use Core\Database\QueryBuilder;

class DemoController extends AppController
{
    public function index()
    {
        require ROOT.'/Query.php';

        echo \Query::select('id','title','content')
                    ->from('article')
                    ->where('category_id=1')
                    ->where('date > NOW()');
    }
}