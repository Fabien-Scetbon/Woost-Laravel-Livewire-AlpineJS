<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        $items = [
            ['name' => '6ème'],
            ['name' => '5ème'],
            ['name' => '4ème'],
            ['name' => '3ème'],
            ['name' => '2nde'],
            ['name' => '1ère'],
            ['name' => 'Tle'],

        ];

        DB::table('levels')->insert($items);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
