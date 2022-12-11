<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Route\Route;

class AddPostController extends AbstractController
{
    #[Route("/addpost", name: "addPost", methods: ["POST"])]
    public function addPost()
    {
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);

        if (!empty($title) && !empty($content)) {

          $date = new \DateTime();

          $postManager = new PostManager(new PDOFactory());
    
          $post = (new Post())->setTitle($title)->setContent($content)->setDate($date)->setAuthor(1)->setImage('image');
          $postManager->insertPost($post);
          echo "post envoyé";
        }
    }
}