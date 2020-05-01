<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('amount');
            $table->string('method', 20);
            $table->string('ref_no', 50);
            $table->integer('course_id');
            $table->dateTime('date', 0)->useCurrent();
            $table->boolean('status');
            $table->string('student_id', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
