<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
            $table->string('driver');
            $table->foreignId('tractor_id')->constrained('tractors');
            $table->enum('trailer',['yes','no']);
            $table->foreignId('trailer_id')->constrained('trailers');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['entrance', 'departure']);
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
        Schema::dropIfExists('accesses');
    }
}
