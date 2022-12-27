<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'nick_name' => "admin",
            'birth_date' => '2000-01-01',
            'status' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
            'is_dev' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => "Desenvolvedor",
            'nick_name' => "dev",
            'birth_date' => '2000-01-01',
            'status' => '1',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'is_dev' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => "Usuário",
            'nick_name' => "user",
            'birth_date' => '2000-01-01',
            'status' => '1',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => false,
            'is_dev' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
