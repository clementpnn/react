<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: "post", methods: ["GET"])]
    public function post()
    {
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        $this->renderJson([
            "posts" => $posts,
        ]);
    }
}