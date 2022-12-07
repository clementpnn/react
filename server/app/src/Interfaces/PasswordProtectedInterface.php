<?php

namespace App\Interfaces;

interface PasswordProtectedInterface
{
    public function getPassword(): string;

    public function passwordMatch(string $plainPwd, string $Pwd): bool;
}