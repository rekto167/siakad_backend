<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            'super_admin',
            'admin',
            'kepala_sekolah',
            'guru',
            'wali_kelas',
            'siswa',
            'user'
        ];
        foreach ($lists as $list) {
            Role::create([
                'name'=>$list,
                'guard_name'=>'web'
            ]);
        }
    }
}
