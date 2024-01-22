<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();

            $table->foreign('labels_id_ref')->constraint('songs_labels_id_ref_foreign')->references('id')->on('labels')->onDelete('cascade');
            $table->foreignID('labels_id_ref');

            $table->string('title');
            $table->string('band');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('songs');
    }
};
