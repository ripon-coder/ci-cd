<?php

namespace App\Trait;
trait NameChange
{
    public function changeName(string $newName): void
    {
        $this->name = $newName;
        $this->save();
    }
}