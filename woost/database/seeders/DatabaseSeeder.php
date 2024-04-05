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
            ['name' => 'Tag1'],
            ['name' => 'Tag2'],
            ['name' => 'Tag3'],
            ['name' => 'Tag4'],
            ['name' => 'Tag5'],
        ];

        DB::table('tags')->insert($items);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
