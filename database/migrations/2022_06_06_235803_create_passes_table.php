<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passes', function (Blueprint $table) {
            $table->id();
            $table->string('driver')->nullable();
            $table->foreignId('tractor_id')->nullable()->constrained();
            $table->foreignId('trailer_id')->nullable()->constrained();
            $table->enum('empty', ['no', 'yes'])->nullable();
            $table->string('seal_number')->unique()->nullable();
            $table->foreignId('access_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->enum('status', ['pending', 'success'])->nullable();
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
        Schema::dropIfExists('passes');
    }
}
