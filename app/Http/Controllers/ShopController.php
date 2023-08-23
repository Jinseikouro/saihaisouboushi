<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function capacity(int $hight,int $width)
    {
        return $hight * $width;
    }
}
