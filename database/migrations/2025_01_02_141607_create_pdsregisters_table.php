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
        Schema::create('pdsregisters', function (Blueprint $table) {
            $table->id('id_pds');
            $table->integer('num_pds');
            $table->date('data_pds');
            $table->string('protocollo');
            $table->integer('idcapitolo');
            $table->integer('capitolo');
            $table->integer('articolo');
            $table->integer('programma');
            $table->integer('idv');
            $table->string('decreto');
            $table->string('oggetto');
            $table->decimal('valore');
            $table->decimal('previmpegno');
            $table->decimal('impegnato');
            $table->decimal('contabilizzato');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_pds');
    }
};
