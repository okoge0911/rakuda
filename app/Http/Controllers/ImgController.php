<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Img;

class ImgController extends Controller
{
    public function __construct()
    {
        $this->mansion = new img();
    }

}
