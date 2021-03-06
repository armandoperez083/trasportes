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
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string('driver')->nullable();
            $table->foreignId('tractor_id')->nullable()->constrained();
            $table->foreignId('trailer_id')->nullable()->constrained();
            $table->enum('empty', ['no', 'yes'])->nullable();
            $table->string('seal_number')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->enum('status', ['entrance', 'departure'])->nullable();
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
