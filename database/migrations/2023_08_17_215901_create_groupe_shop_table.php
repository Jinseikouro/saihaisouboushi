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
        Schema::create('groupe_shop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupe_id')->refarences('id')->on('groupe')->ondelete('cascade');
            $table->foreignId('shop_id')->refarences('id')->on('shop')->ondelete('cascade');
            $table->unique(['groupe_id','shop_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_shop');
    }
};
