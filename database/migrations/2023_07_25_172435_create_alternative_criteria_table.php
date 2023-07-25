<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativeCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternative_criteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->unsignedBigInteger('criterion_id');
            $table->unsignedBigInteger('sub_criterion_id')->nullable();
            $table->timestamps();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade');
            $table->foreign('sub_criterion_id')->references('id')->on('sub_criteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternative_criteria');
    }
}

