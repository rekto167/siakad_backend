<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function days()
    {
        $days = Day::all();
        return ResponseFormatter::success($days, 'Data hari berhasil diambil');
    }
}
