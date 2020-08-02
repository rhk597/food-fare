<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management', function (Blueprint $table) {
            $table->id('srno');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('lastname');
            $table->string('password');
            $table->text('sec_answer');
            $table->Integer('security_status')->nullable();
            $table->bigInteger('sec_id')->unsigned();
            $table->foreign('sec_id')
            ->references('srno')->on('security_questions');
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
        Schema::dropIfExists('management');
    }
}
