<?php

declare(strict_types=1);

namespace App\Users;

use App\Container;

class UserRepository implements UserInterface
{
    private $db;

    public function __construct()
    {
        $this->db = Container::get('db');
    }
    public function listUsers()
    {
        $query = "SELECT * FROM usuarios";
        $results = $this->db->querySync($query);
        return $results->fetchAll();
    }

    public function createUser(array $data)
    {
        $query = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
        $statement = $this->db->prepare($query);
        $statement->bindValues([
            'nome' => $data['nome'],
            'email' => $data['email'],
        ]);
        $statement->querySync();
        echo "Usuário criado com sucesso!\n";
    }
}
