<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $username;
    private string $password;
    private string $email;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @param bool $hash
     * @return User
     */
    public function setPassword($password, bool $hash = false): User
    {
        if ($hash) {
            $password = password_hash($password, PASSWORD_ARGON2ID);
        }
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $plainPwd
     * @param string $Pwd
     * @return bool
     */
    public function passwordMatch(string $plainPwd, string $Pwd): bool
    {   
        if (password_verify($plainPwd, $Pwd)) {
            return true;
        } else {
            return false;
        }
    }
}