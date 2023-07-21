<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unique('name', 'books_name_unique');
            $table->index(['year', 'lang'], 'books_year_lang_index');
            $table->index('created_at', 'books_created_at_index');
            $table->index('category_id', 'books_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropIndex(
                [
                    'books_name_unique',
                    'books_year_lang_index',
                    'books_created_at_index',
                    'books_category_id',
                ]
            );
        });
    }
};
