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

                $userManager = new UserManager(new PDOFactory());

                if ($userManager->verifyMail($email)) {
                    echo "mail déjà utilisé";
                    exit;
                }

                $user = (new User())->setUsername($name)->setEmail($email)->setPassword($password, true);
                $userManager->insertUser($user);

                // $token = $userManager->generateJWT(['alg' => 'HS256', 'typ' => 'JWT'], ['email' => $email, 'password' => $password]);
                // $_COOKIE['token'] = $token;
                echo "insciption ok";
                exit;

            } else {
                echo "les mots de passe ne corresponde pas";
                exit;
            }
        }

        if (!empty($email) && !empty($password)) {

            $userManager = new UserManager(new PDOFactory());

            $data = $userManager->getPwd($email);

            $user = (new User())->setId($data['id']);

            if (!$user) {
                echo "l'utilisateur n'existe pas";
                exit;
            }

            if ($user->passwordMatch($password, $data['password'])) {
                // $token = $userManager->generateJWT(['alg' => 'HS256', 'typ' => 'JWT'], ['email' => $email, 'password' => $password]);
                // $_COOKIE['token'] = $token;
                echo "connection ok";
                exit;
            }
        }
    }
}