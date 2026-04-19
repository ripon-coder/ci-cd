<?php
namespace App\DTOs;
class PostDTO{
    public function __construct(public string $title, public string $content, public int $is_published){}                         
}