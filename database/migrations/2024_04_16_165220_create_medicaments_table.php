<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nomCommercial');
            $table->text('composition');
            $table->text('effets');
            $table->text('contreindication');
            $table->unsignedBigInteger('idFamille');
            $table->foreign('idFamille')->references('id')->on('familles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicaments');
    }
}

