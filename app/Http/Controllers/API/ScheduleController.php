<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Schedule;

class ScheduleController extends Controller
{
   public index()
   {
     $schedule = Schedule::paginate(20);
     return ResponseFormatter::success($schedule, 'Data jadwal pelajaran fetched');
   }
   
   public function create(Request $request)
   {
     return $request;
   }
}
