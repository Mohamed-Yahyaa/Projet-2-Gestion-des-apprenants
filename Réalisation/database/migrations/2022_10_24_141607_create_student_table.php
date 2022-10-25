<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->increments("id");
            $table->string('NamePromotion')->nullable();


        });
    Schema::create('Students', function (Blueprint $table) {
        $table->increments("Id_student");
        $table->string('First_name')->nullable();
        $table->string('Last_name')->nullable();
        $table->string('Email')->nullable();
        $table->unsignedInteger('PromotionID')->nullable();
        $table->foreign('PromotionID')
        ->references('id')
        ->on('promotion')
        ->onDelete('cascade');
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
        Schema::dropIfExists('student');
    }

    
};
