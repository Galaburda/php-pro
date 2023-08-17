<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;


class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'name' => $faker->name,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            DB::table('authors')->insert($chunk);
        }
    }
}
