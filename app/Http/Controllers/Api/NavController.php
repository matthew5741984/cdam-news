<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NavIndexResource;
use App\Navigation;

class NavController extends Controller
{
    public function index()
    {
        return NavIndexResource::collection(
            Navigation::all()
        );
    }
}
