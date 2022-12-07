<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{

    // /**
    //  * @param int $id
    //  * @return User[]
    //  */
    // public function getAllUsers(int $id)
    // {
    //     $query = $this->pdo->query("SELECT * FROM User WHERE id != $id");
    //     $data = $query->fetchAll(\PDO::FETCH_ASSOC);
    //     return $data;
    // }

    // /**
    //  * @param string $email
    //  * @return ?User
    //  */
    // public function getByMail(string $email): ?User
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
    //     $query->bindValue("email", $email, \PDO::PARAM_STR);
    //     $query->execute();
    //     $data = $query->fetch(\PDO::FETCH_ASSOC);

    //     if ($data) {
    //         return new User($data);
    //     }

    //     return null;
    // }


    // public function getPwd(string $email)
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
    //     $query->bindValue("email", $email, \PDO::PARAM_STR);
    //     $query->execute();
    //     $data = $query->fetch(\PDO::FETCH_ASSOC);

    //     if ($data) {
    //         return $data;
    //     }

    //     return null;
    // }

    // public function getById(string $id)
    // {
    //     $query = $this->pdo->prepare("SELECT * FROM User WHERE id = :id");
    //     $query->bindValue("id", $id, \PDO::PARAM_INT);
    //     $query->execute();
    //     $data = $query->fetch(\PDO::FETCH_ASSOC);

    //     return $data;
    // }

    public function verifyMail(string $mail): bool
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE email = :email");
        $query->bindValue("email", $mail, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();

        if($data) {
          return true;
        }
    }

    // public function delUser($id)
    // {
    //     $query = $this->pdo->prepare("DELETE FROM User WHERE 'id' = $id");
    //     $query->execute();
    // }

    // public function updateUser($user, $id): void
    // {
    //     $query = $this->pdo->prepare("UPDATE User SET (username, password, email, admin) VALUES (:username, :password, :email, :admin) WHERE 'id' = $id");
    //     $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
    //     $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
    //     $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
    //     $query->bindValue("admin", $user->getAdmin(), \PDO::PARAM_INT);
    //     $query->execute();
    // }

    /**
     * @param User $user
     * @return int
     */
    public function insertUser(User $user): int
    {
        $query = $this->pdo->prepare("INSERT INTO User (username, password, email) VALUES (:username, :password, :email)");
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->bindValue("password", $user->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("email", $user->getEmail(), \PDO::PARAM_STR);
        $query->execute();

        return $this->pdo->lastInsertId();
    }
}