<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffrirTable extends Migration
{
    public function up()
    {
        Schema::create('offrir', function (Blueprint $table) {
            $table->unsignedBigInteger('idRapport');
            $table->unsignedBigInteger('idMedicament');
            $table->integer('quantite');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('idRapport')->references('id')->on('rapports')->onDelete('cascade');
            $table->foreign('idMedicament')->references('id')->on('medicaments')->onDelete('cascade');

            // Clé primaire composée
            $table->primary(['idRapport', 'idMedicament']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('offrir');
    }
}

