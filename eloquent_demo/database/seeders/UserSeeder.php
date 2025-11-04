<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     [
        //         'name' => 'Иван',
        //         'email' => 'ivan@example.com',
        //         'password' => Hash::make('secret'),
        //         'role' => 'user',
        //     ],
        //     [
        //         'name' => 'Мария',
        //         'email' => 'maria@example.com',
        //         'password' => Hash::make('secret'),
        //         'role' => 'admin',
        //     ],
        //     [
        //         'name' => 'Алексей',
        //         'email' => 'alex@example.com',
        //         'password' => Hash::make('secret'),
        //         'role' => 'user',
        //     ],
        //     [
        //         'name' => 'Елена',
        //         'email' => 'elena@example.com',
        //         'password' => Hash::make('secret'),
        //         'role' => 'user',
        //     ],
        //     [
        //         'name' => 'Павел',
        //         'email' => 'pavel@example.com',
        //         'password' => Hash::make('secret'),
        //         'role' => 'user',
        //     ],
        // ]);
        User::factory(10)->create();
    }
}
