<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->longText('description');
            $table->string('title');
            $table->string('type');
            $table->longText('content');
            // $table->string('video')->nullable();
            // $table->string('photo')->nullable();
            $table->string('slug');
            $table->double('price',2);
            $table->boolean('online')->nullable()->default(false);
            $table->bigInteger('city_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // index
            $table->index(['deleted_at']);
            // $table->index(['slug']);
            // $table->index(['price']);
            // $table->index(['type']);
            // $table->index(['title']);
            // $table->index(['description']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
