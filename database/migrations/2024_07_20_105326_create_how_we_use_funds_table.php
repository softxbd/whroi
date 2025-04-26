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
        Schema::create('how_we_use_funds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('caption');
            $table->string('programs');
            $table->integer('programs_value');
            $table->string('fundraising');
            $table->integer('fundraising_value');
            $table->string('management');
            $table->integer('management_value');
            $table->string('slug');
            $table->integer('logged_in_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_we_use_funds');
    }
};
