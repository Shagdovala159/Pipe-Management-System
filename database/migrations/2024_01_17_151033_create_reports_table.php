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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('reporter')->nullable();
            $table->string('category')->nullable();
            $table->string('when')->nullable();
            $table->string('where')->nullable();
            $table->string('who')->nullable();
            $table->string('what')->nullable();
            $table->string('why')->nullable();
            $table->string('how')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
