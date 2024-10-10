<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{ 
    use HasFactory;
    protected $fillable = [ 
        'title',
        'sub_title', 
        'location',
        'land_size',
        'land_price',
        'second_land_size',
        'second_land_price',
        'project_menu_id', 
        'content',
        'amenities_image',
        'brochure',
        'land_payment_plan',
        'second_land_payment_plan',
        'subscription_form',
        'video_link',
        'image',
        'image_banner',
    ];
 
    public function projectMenu()
    {
        return $this->belongsTo(ProjectMenu::class, 'project_menu_id');
    }

}
