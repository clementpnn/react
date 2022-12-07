<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Entity\User;
use App\Route\Route;

class RegisterController extends AbstractController
{
    #[Route('/', name: "register", methods: ["POST"])]
    public function register()
    {
        header("Location: /http://localhost:5173/test");
        exit;
        
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password']) && !empty($_POST['admin'])) {
            if ($_POST['password'] === $_POST['confirm-password']) {
                
                $name = htmlspecialchars($_POST['name']);
                $mail = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                $userManager = new UserManager(new PDOFactory());

                if ($userManager->verifyMail($mail)) {
                    header("Location: /signin?error=6");
                    exit;
                }

                $user = (new User())->setUsername($name)->setEmail($mail)->setPassword($password, true);
                $id = $userManager->insertUser($user);

                $_COOKIE['id'] = $id;

                header("Location: /http://localhost:5173/test");
                exit;
            }
        }
    }
}