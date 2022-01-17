<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->nullable()->references('id')->on('users')->onDelete('CASCADE');
            $table->string('title');
            $table->string('slug');
            $table->dateTime('start')->nullable();
            $table->longText('content')->nullable();
            $table->longText('description');
            // $table->string('video')->nullable();
            // $table->string('photo')->nullable();
            $table->double('price', 2)->default(0.0);
            $table->boolean('online')->nullable()->default(false);
            $table->bigInteger('city_id')->nullable();
            //$table->timestamp('start')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('lessons');
    }
}
