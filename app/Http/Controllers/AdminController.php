<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\DropdownItem;
use App\Models\Slider;
use App\Http\Traits\AdminTrait;

class AdminController extends Controller
{
    use AdminTrait;
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    { 
       
        return view('admin.users.index', [
            'bheading' => 'Index',
            'breadcrumb' => 'Index',
        ]); 
    }

}
