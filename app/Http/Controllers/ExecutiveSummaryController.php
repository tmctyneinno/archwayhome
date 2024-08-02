<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutiveSummaryController extends Controller
{
    public function index(){
        return view('admin.settings.executiveSummary.executive_summary');
    }


}
