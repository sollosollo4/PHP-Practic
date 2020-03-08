<?php

namespace Models\Articles;

use Services\Db;
use Models\Users\User;
use Models\ActiveRecordEntity;


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

}

?>