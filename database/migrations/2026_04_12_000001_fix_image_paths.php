<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class FixImagePaths extends Migration
{
    /**
     * Remove the 'equipments/' prefix from image paths.
     *
     * The 'equipments' disk root is already set to storage/app/public/equipments,
     * so paths should not include the 'equipments/' subdirectory prefix.
     * Old paths like 'equipments/filename.jpg' become 'filename.jpg'.
     */
    public function up()
    {
        DB::table('images')
            ->where('path', 'like', 'equipments/%')
            ->eachById(function ($image) {
                DB::table('images')
                    ->where('id', $image->id)
                    ->update(['path' => preg_replace('#^equipments/#', '', $image->path)]);
            });
    }

    /**
     * Restore the 'equipments/' prefix to image paths (rollback).
     */
    public function down()
    {
        DB::table('images')
            ->where('path', 'not like', 'equipments/%')
            ->eachById(function ($image) {
                DB::table('images')
                    ->where('id', $image->id)
                    ->update(['path' => 'equipments/' . $image->path]);
            });
    }
}