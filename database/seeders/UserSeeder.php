<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 'admin',
        ],

        [
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' =>  bcrypt('gudang'),
            'level' => 'gudang',
        ]
    ];
        foreach ($user as $key => $value) {
            User::create($value);
        }

    }

}
