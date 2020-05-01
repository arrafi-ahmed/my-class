<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('password', 50);
            $table->string('name', 50);
            $table->string('dept', 50);
            $table->string('qualification', 100);
            $table->string('email', 50);
            $table->integer('salary');
            $table->string('profile_photo', 50);
            $table->boolean('valid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
