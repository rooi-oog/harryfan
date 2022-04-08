<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $with = ['sections'];

    public function heading ()
    {
        return $this->belongsTo(Heading::class);
    }

    public  function  sections ()
    {
        return $this->hasMany(Section::class);
    }
}
