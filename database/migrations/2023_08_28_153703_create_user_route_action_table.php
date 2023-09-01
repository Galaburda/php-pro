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
        Schema::create('user_route_action', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('route', 255);
            $table->enum(
                'method',
                ['POST', 'GET', 'PUT', 'PATCH', 'HEAD', 'DELETE', 'TRACE']
            );
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_route_action');
    }
};
