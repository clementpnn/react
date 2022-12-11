<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("SELECT User.username, Post.id, Post.content, Post.author, Post.title, Post.date, Post.image FROM Post JOIN User ON Post.author = User.id ORDER BY Post.date DESC");
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertPost(Post $post): void
    {
        $query = $this->pdo->prepare("INSERT INTO Post (content, title, date, author, image) VALUES (:content, :title, STR_TO_DATE(:date, '%d/%m/%Y %H:%i:%s' ), :author, :image)");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("title", $post->getTitle(), \PDO::PARAM_STR);
        $query->bindValue("date", $post->getDate()->format('d/m/Y H:i:s'));
        $query->bindValue("author", $post->getAuthor(), \PDO::PARAM_INT);
        $query->bindValue("image", $post->getImage(), \PDO::PARAM_STR);
        $query->execute();
    }
}