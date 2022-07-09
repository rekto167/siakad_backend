<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Schedule;
use Exception;

class ScheduleController extends Controller
{
   public function index()
   {
     $schedule = Schedule::paginate(20);
     return ResponseFormatter::success($schedule, 'Data jadwal pelajaran fetched');
   }
   
   public function create(Request $request)
   {
     try {
      return $request->all();
     } catch (Exception $error) {
      return ResponseFormatter::error($error, 'Something went wrong');
     }
   }
}
