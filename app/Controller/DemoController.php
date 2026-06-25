<?php

namespace App\Controller;

use Core\Database\QueryBuilder;

class DemoController extends AppController
{
    public function index()
    {
        $query=new QueryBuilder();
        echo $query
            ->select('id','title','content')
            ->from('article')
            ->where('category_id=1')
            ->where('date > NOW()');
    }
}