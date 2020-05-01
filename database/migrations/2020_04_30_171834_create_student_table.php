<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('password', 50);
            $table->string('name', 50);
            $table->string('dept', 50);
            $table->string('parent_contact', 50);
            $table->string('email', 50);
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
        Schema::dropIfExists('student');
    }
}
