<?php

namespace App\Services\Word;

use App\Services\Word\DTO\WordDTO;
use Illuminate\Support\Facades\DB;

class WordRepository
{
    public function create(WordDTO $word)
    {
        DB::table('get_word_result')->insert([
            'name' => $word->getName(),
            'result' => $word->getResult(),
        ]);
    }
}
