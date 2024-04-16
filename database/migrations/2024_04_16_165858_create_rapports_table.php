<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('motif');
            $table->text('bilan');
            $table->unsignedBigInteger('visiteur_id');
            $table->unsignedBigInteger('idMedecin');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('visiteur_id')->references('id')->on('visiteurs')->onDelete('cascade');
            $table->foreign('idMedecin')->references('id')->on('medecins')->onDelete('cascade');

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('rapports');
    }
}

