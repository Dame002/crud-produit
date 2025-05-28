<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('factures_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facture_id')->constrained()->onDelete('cascade');
            $table->foreignId('produit_id')->constrained()->onDelete('cascade');
            $table->integer('qte')->default(1);
            $table->timestamps();
            
            // Optionnel : empêche les doublons
            $table->unique(['facture_id', 'produit_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('factures_produits');
    }
};