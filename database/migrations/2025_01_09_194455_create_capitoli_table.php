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
        Schema::create('capitoli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departament_id')->constrained('departaments');
            $table->integer('capitolo');
            $table->integer('art');
            $table->integer('prog');
            $table->integer('idv');
            $table->decimal('preavviso', 2);
            $table->string('decreto');
            $table->string('ops');
            $table->integer('idreparto');
            $table->string('anno');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitoli');
    }
};
