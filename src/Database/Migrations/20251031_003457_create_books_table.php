<?php

declare(strict_types=1);

use App\Container;

return new class 
{
    public function up(): string
    {
        return <<<CQL
                    CREATE TABLE IF NOT EXISTS teste.books (
                        id uuid PRIMARY KEY,
                        ISBN text,
                        "Book-Title" text,
                        "Book-Author" text,
                        "Year-Of-Publication" int,
                        "Publisher" text,
                        "Image-URL-S" text,
                        "Image-URL-M" text,
                        "Image-URL-L" text
                    );
            CQL;
    }

    public function down(): string
    {
       return <<<CQL

       CQL;
    }
};
