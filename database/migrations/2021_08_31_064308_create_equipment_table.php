<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name_slug')->unique();
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price_rent')->nullable();
            $table->decimal('price_sale')->nullable();
            $table->string('capacity')->nullable();
            $table->string('motor')->nullable();
            $table->text('description')->nullable();
            $table->enum('exchange', ['MXN', 'DLLS']);
            $table->unsignedBigInteger('type_equipment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
