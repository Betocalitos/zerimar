<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_slug')->unique();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price_rent', 10, 2)->nullable();
            $table->decimal('price_sale', 10, 2)->nullable();
            $table->string('capacity')->nullable();
            $table->string('motor')->nullable();
            $table->text('description')->nullable();
            $table->string('exchange', 3)->default('MXN');
            $table->boolean('charger')->nullable();
            $table->boolean('battery')->nullable();
            $table->string('max_height')->nullable();
            $table->string('nationality')->nullable();
            $table->boolean('is_bundle_member')->default(false);
            $table->unsignedBigInteger('equipment_type_id');
            $table->foreign('equipment_type_id')->references('id')->on('equipment_types')->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}