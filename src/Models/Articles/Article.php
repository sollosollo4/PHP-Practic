<?php

namespace Models\Articles;

use Services\Db;
use Models\Users\User;
use Models\ActiveRecordEntity;
use Exceptions\InvalidArgumentException;

class Article extends ActiveRecordEntity
{
    /** @var string */
    public $name;

    /** @var string */
    public $text;

    /** @var int */
    public $authorId;

    /** @var string */
    public $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    public function setName($newName)
    {
        $this->name = $newName;
    }

    public function setText($newText)
    {
        $this->text = $newText;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }


    /**
     * @return User
     */
    public function getAuthor()
    {
        return User::getById($this->getAuthorId());
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    protected static function getTableName(): string 
    {
        return 'articles';
    }

    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    public function updateFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

}

?>