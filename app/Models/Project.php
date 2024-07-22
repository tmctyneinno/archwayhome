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
        'project_menu_id',
        'content',
        'brochure',
        'land_payment_plan',
        'subscription_form',
        'video_link',
        'image',
    ];
 
    public function projectMenu()
    {
        return $this->belongsTo(ProjectMenu::class, 'project_menu_id');
    }

}
