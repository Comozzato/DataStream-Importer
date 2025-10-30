<?php

declare(strict_types=1);

namespace App\Users;


class UserController
{
    // Implementação do controlador de usuários
    private UserRepository $userRepository;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    public function listUsers()
    {
        return $this->userRepository->listUsers();
    }
}
