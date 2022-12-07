<?php

namespace App\Controller;

abstract class AbstractController
{
    public function __construct(string $action, array $params = [])
    {
        if (!is_callable([$this, $action])) {
           throw new \RuntimeException("La methode $action n'est pas disponible dans ce controller");
        }
        call_user_func_array([$this, $action], $params);
    }

    public function renderJson(array $args = [])
    {
        header("Content-Type: application/json");
        echo json_encode($args);
        exit;
    }
}