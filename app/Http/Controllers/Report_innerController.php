<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Report_inner;
use App\Http\Controllers\ReportController;

class Report_innerController extends Controller
{
    public function __construct()
    {
        $this->report = new Report();
        $this->report = new Report_inner();
    }
    
}