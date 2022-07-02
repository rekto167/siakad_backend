<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        
    }

    public function create(Request $request)
    {
        return ResponseFormatter::success('ada');
    }
}
