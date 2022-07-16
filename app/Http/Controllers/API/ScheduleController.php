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
      $data = [
        'classroom_id' => $request->kelas,
        'mapel_id' => $request->mapel,
        'pengajar' => $request->guru,
        'day_id' => $request->hari,
        'start_time'=>$request->waktu_awal,
        'end_time'=>$request->waktu_akhir
      ];
      $jadwal = Schedule::create($data);

      return ResponseFormatter::success($jadwal, 'Berhasil menambahkan jadwal pelajaran');
     } catch (Exception $error) {
      return ResponseFormatter::error($error, 'Something went wrong');
     }
   }
}
