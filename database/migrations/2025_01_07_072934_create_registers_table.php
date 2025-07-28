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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->integer('idreparto');
            $table->string('reparto')->nullable(false);
            $table->string('numpds')->nullable();
            $table->date('datapds');
            $table->longText('oggetto');
            $table->integer('idcapitolo');
            $table->integer('capitolo');
            $table->integer('art');
            $table->integer('prog');
            $table->integer('idv');
            $table->string('decreto');
            $table->decimal('importo', 10,2);
            $table->decimal('previstoimpegno',10,2   );
            $table->decimal('impegnato',10,2);
            $table->decimal('contabilizzato',10,2);
            $table->longText('note')->nullable();
            $table->boolean('registrato')->default(false);
            $table->boolean('impegnato_flag')->default(false);
            $table->boolean('validato')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
