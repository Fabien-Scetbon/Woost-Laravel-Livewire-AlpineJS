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
            'status' => '3',
            'is_ban' => '0',
            'password' => Hash::make('ffffffff'),
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
