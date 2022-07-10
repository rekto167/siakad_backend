<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Schedule;
use Exception;

class ScheduleController extends Controller
{
  public index() {
    $schedule = Schedule::paginate(20);
    return ResponseFormatter::success($schedule, 'Data jadwal pelajaran fetched');
  }

  public function create(Request $request) {
    try {
      return ResponseFormatter::success($request->all(), 'Data');
      // $request->validate([
      //   'classroom_id' => ['required'],
      //   'mapel_id' => ['required'],
      //   'pengajar' => ['required'],
      //   'day' => ['required'],
      //   'start_time' => ['required'],
      //   'end_time' => ['required']
      // ]);
      // return 'got it';
    } catch (Exception $err) {
      return 'something wrong';
    }
  }
}