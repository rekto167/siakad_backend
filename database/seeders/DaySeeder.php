<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
          'name' =>  'Senin'
        ]);
          
        Day::create([
          'name' =>  'Selasa'
        ]);
        Day::create([
          'name' =>  'Rabu'
          ]);
          
        Day::create([
          'name' =>  'Kamis'
        ]);
        
        Day::create([
          'name' =>  "Jum'at"
        ]);
          
        Day::create([
          'name' =>  'Sabtu'
        ]);
    }
}
