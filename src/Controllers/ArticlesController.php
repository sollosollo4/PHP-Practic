<?php

namespace Controllers;

use Exceptions\NotFoundException;
use Models\Articles\Article;
use Models\Users\User;

class ArticlesController extends AbstractController
{

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article
        ]);
    }

    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if($article === null) {
            throw new NotFoundException();
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');
        
        $article->save();         
    }

    public function add(): void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();

        var_dump($article);
    }


    protected static function getTableName(): string
    {
        return 'articles';
    }
}
?>