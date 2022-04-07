<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorited extends Model
{
    use HasFactory;

    protected $table = "favorited";
    protected $primaryKey = 'id';
    public $incrementing = false;
}
