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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->refarences('id')->on('drivers')->ondelete('cascade');
            $table->foreignId('groupe_id')->default(0);
            $table->dateTime('delivery_start_time');
            $table->dateTime('delivery_end_time');
            $table->integer('shipment_size');
            $table->integer('shipment_hight');
            $table->integer('shipment_width');
            $table->boolean('stateOfDelivery')->comment('店へ配送済みなら0、配送中なら1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
