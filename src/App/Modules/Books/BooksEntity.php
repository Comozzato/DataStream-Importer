<?php

declare(strict_types=1);

namespace App\Modules\Books;

class BooksEntity
{
    private string $table = 'books';
    
    private array $fields = [
        'id',
        'title',
        'author',
        'published_year',
    ]; 
}