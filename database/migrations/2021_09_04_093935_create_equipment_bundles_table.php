<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentBundlesTable extends Migration
{
    public function up()
    {
        Schema::create('equipment_bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price_sale', 10, 2)->nullable();
            $table->string('exchange', 3)->default('MXN');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('bundle_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_bundle_id');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_bundle_id')->references('id')->on('equipment_bundles')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bundle_equipment');
        Schema::dropIfExists('equipment_bundles');
    }
}