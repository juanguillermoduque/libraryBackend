<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    //se deshabilita el uso de timestamps
    public $timestamps = false;

    //se definen los campos que se pueden llenar
    protected $fillable = [
        'title',
        'author',
        'date_post',
        'genre',
    ];
}
