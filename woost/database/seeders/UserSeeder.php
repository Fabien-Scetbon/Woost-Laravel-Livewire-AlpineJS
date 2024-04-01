<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'firstname' => 'Fabien',
            'lastname' => 'Scetbon',
            'email' => 'mrscetbon@hotmail.com',
            'postalcode' =>'34000',
            'city' => 'Montpellier',
            'department' => 'Hérault',
            'city_lat' => '43.62505',
            'city_long' => '3.862038',
            'status' => '3',
            'is_ban' => '0',
            'password' => Hash::make('ffffffff'),
            'image' => 'seeder_user.webp',
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
