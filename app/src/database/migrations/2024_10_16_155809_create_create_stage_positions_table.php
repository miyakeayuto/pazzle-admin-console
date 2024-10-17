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
        Schema::create('create_stage_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('create_stage_id');
            $table->integer('type');
            $table->float('x');
            $table->float('y');
            $table->timestamps();

            //ユニーク制約設定
            $table->unique('create_stage_id');
            $table->unique('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_stage_positions');
    }
};
