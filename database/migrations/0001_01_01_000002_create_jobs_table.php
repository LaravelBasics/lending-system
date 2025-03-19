<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue');
            $table->text('payload');
            $table->integer('attempts');
            $table->timestamp('reserved_at')->nullable();
            $table->timestamp('available_at');
            $table->timestamps();

            // コメントアウトして一時的にインデックスを作成しない
            // $table->index('queue'); // ここをコメントアウト
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
