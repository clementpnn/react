<?php

namespace App\Entity;

class Post extends BaseEntity
{
    private int $id;
    private string $title;
    private string $content;
    private int $author;
    private string $image;
    private $date;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Post
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Post
     */
    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    /**
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return Post
     */
    public function setAuthor(int $author): Post
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string
     * @return Post
     */
    public function setImage(string $image): Post
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * 
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

}