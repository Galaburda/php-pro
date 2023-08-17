<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'book_id' => $faker->numberBetween(1, 100000),
                'author_id' => $faker->numberBetween(1, 100000),
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            DB::table('author_book')->insert($chunk);
        }
    }
}
