<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        return ResponseFormatter::success($mapel, 'Data mata pelajaran fetched');
    }

    public function create(Request $request)
    {
        $request->validate(['name' => ['required', 'string', 'max:255']]);

        $data = ['name' => $request->name];

        $mapel = Mapel::create($data);
        return ResponseFormatter::success($mapel, 'Mata pelajaran berhasil ditambahkan');
    }

    public function mapels()
    {
        $mapels = Mapel::all();
        return ResponseFormatter::success($mapels, 'Data daftar mata pelajaran berhasil diambil');
    }
}
