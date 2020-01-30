<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_notes', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('note_text1');
            $table->string('note_text2');
            $table->string('note_image1');
            $table->string('note_image2');
            $table->integer('emp_id');
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
        Schema::dropIfExists('employee_notes');
    }
}
