<?php

namespace App\Repositories\Books;

use App\Repositories\Books\Iterators\BookIndexIterator;
use App\Repositories\Books\Iterators\BookIterator;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class BooksRepository
{
    private Collection $books;

    public function store(BooksStoreDTO $data): int
    {
        return DB::table('books')
            ->insertGetId([
                'name' => $data->getName(),
                'year' => $data->getYear(),
                'lang' => $data->getLang(),
                'pages' => $data->getPages(),
                'created_at' => $data->getCreatedAt(),
            ]);
    }

    public function getById(int $bookId): BookIterator
    {
        return new BookIterator(
            DB::table('books')
                ->where('id', '=', $bookId)
                ->first()
        );
    }

    public function update(BookUpdateDTO $data): int
    {
        return DB::table('books')
            ->where('id', '=', $data->getId())
            ->update([
                'name' => $data->getName(),
                'year' => $data->getYear(),
                'lang' => $data->getLang(),
                'pages' => $data->getPages(),
                'updated_at' => $data->getUpdatedAt(),
            ]);
    }

    public function delete($bookId): void
    {
        DB::table('books')
            ->delete($bookId);
    }

    public function selectToFilter(BookIndexDTO $data): Collection
    {
        $query = DB::table('books')
            ->select(
                'books.id',
                'books.name',
                'books.created_at',
                'year',
                'lang',
                'pages',
                'category_id',
                'categories.name as category_name',
            )
            ->join(
                'categories',
                'categories.id',
                '=',
                'books.id'
            )
            ->whereBetween(
                'books.created_at',
                [$data->getStartDate(), $data->getEndDate()]
            )
            ->when($data->getYear(), function (Builder $query, $year) {
                $query->where('year', '=', $year);
            })
            ->when($data->getLang(), function (Builder $query, $lang) {
                $query->where('lang', '=', $lang);
            })
            ->where('books.id', '>', $data->getLastId())
            ->limit(5)
            ->get();

        return $query->map(function ($item) {
            return new BookIterator($item);
        });
    }
}
