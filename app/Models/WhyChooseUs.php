<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_title', 
        'first_content', 
        'second_title',  
        'second_content', 
        'third_title',  
        'third_content', 
        'four_title',  
        'four_content', 
        'image'
    ];
}
