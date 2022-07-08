<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    Mapel::create([
      'name' => 'Matematika'
    ]);
    Mapel::create([
      'name' => 'IPA'
    ]);
    Mapel::create([
      'name' => 'IPS'
    ]);
Mapel::create([
          'name' => 'Seni Budaya'
        ]);
Mapel::create([
          'name' => 'Penjaskes'
        ]);
Mapel::create([
          'name' => 'PAI'
        ]);
Mapel::create([
          'name' => 'Bahasa Indonesia'
        ]);
Mapel::create([
          'name' => 'Bahasa Inggris'
        ]);
Mapel::create([
          'name' => 'Bimbingan Konseling'
        ]);
  }
}