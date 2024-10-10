<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;
    protected $table = 'core_values';
    protected $fillable = [
        'core_values', 
        'mission', 
        'vision', 
        'image'
    ];
}
