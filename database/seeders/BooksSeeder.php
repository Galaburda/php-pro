<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'name' => $faker->unique()->text(20),
                'year' => $faker->dateTime(),
                'lang' => $faker->randomElement(['en', 'ua', 'pl', 'de']),
                'pages' => $faker->numberBetween(1, 55000),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'category_id' => $faker->numberBetween(1, 200),
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            DB::table('books')->insert($chunk);
        }
    }
}
