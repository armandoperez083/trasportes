<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tractors', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->enum('type', ['emtpy', 'full']);
            $table->string('stamp');
            $table->string('license_plate');
            $table->enum('status', ['parking','entrance', 'departure', 'pass']);
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
        Schema::dropIfExists('tractors');
    }
}
