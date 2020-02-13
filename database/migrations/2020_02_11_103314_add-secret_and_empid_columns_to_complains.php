<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSecretAndEmpidColumnsToComplains extends Migration
{


    public function up()
    {
        Schema::table('complains', function (Blueprint $table)
         {
           $table->integer('emp_id');
           $table->String('emp_code');
           $table->string('secret'); 
        });
    }


    public function down()
    {
        Schema::table('complains', function (Blueprint $table) {
            Schema::dropIfExists('complains');
        });
    }
}
