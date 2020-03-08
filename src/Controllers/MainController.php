<?php

namespace Controllers;

use Models\Articles\Article;
use Services\Db;
use View\View;

class MainController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
        $db = Db::getInstance();
    }
    
    public function main()
    {
        $articles = Article::findAll();
        //return;
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }
}
?>