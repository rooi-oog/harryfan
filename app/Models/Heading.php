<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Heading extends Model
{

    public function categories (): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function sections (): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Section::class, Category::class);
    }
}
