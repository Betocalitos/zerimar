<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('feature_keys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('extra_features', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('value');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('feature_key_id')->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->foreign('feature_key_id')->references('id')->on('feature_keys')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extra_features');
        Schema::dropIfExists('feature_keys');
    }
}