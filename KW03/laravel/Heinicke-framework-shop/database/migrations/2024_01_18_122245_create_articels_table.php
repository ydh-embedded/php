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
        Schema::create('articels', function (Blueprint $table) {
            $table->id          ()                      ;
            $table->string      ('ArticName')           ;
            $table->string      ('ArticName_id_ref')    ;
            $table->string      ('ArticContent')        ;
            $table->string      ('ArticDescription')    ;
            $table->string      ('ArticPicture')        ;
            $table->string      ('ArticThumbnail')      ;
            $table->timestamps  ()                      ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articels');
    }
};
