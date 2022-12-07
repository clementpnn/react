<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Entity\User;
use App\Route\Route;

class RegisterController extends AbstractController
{
    #[Route("/", name: "register", methods: ["POST"])]
    public function register()
    {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);
        $passwordConfirm = htmlspecialchars($_POST["passwordConfirm"]);

        if (!empty($name) && !empty($email) && !empty($password) && !empty($passwordConfirm)) {
            if ($password === $passwordConfirm) {
                
                echo "on est bon";

                $userManager = new UserManager(new PDOFactory());

                if ($userManager->verifyMail($email)) {
                    echo "mail déjà utilisé";
                    exit;
                }

                $user = (new User())->setUsername($name)->setEmail($email)->setPassword($password, true);
                $id = $userManager->insertUser($user);

        //         $_COOKIE['id'] = $id;
                exit;
            } else {
                echo "les mots de passe ne corresponde pas";
                exit;
            }
        }
    }
}