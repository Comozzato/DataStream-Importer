<?php

declare(strict_types=1);

namespace App\Users;

class UserEntity
{
    private string $table = 'usuarios';
    
    private array $fields = [
        'id',
        'name',
        'email',
    ]; 
}