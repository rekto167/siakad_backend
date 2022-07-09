<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Exception;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classroom::all();
        return ResponseFormatter::success($class);
    }

    public function classrooms()
    {
        $classroom = Classroom::all();
        return ResponseFormatter::success($classroom, 'Data Kelas berhasil diambil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:25'],
                'wali_kelas' => ['required']
            ]);

            $data = ['name' => $request->name, 'wali_kelas' => $request->wali_kelas];

            $class = Classroom::create($data);

            return ResponseFormatter::success([$class], 'Kelas berhasil di tambahkan');
        } catch (Exception $err) {
            return ResponseFormatter::error([
                'error' => $err->getMessage()
            ], 'Something went wrong', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
